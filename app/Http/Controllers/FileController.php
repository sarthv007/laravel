<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Attendance;


class FileController extends Controller {

public function import(){

    $data['title'] = "Import Users";
    $total_time = Attendance::where('user_id', '18')->sum(\DB::raw("TIME_TO_SEC(actual_hours)"));
    $total_hours = $total_time/3600;

    #print_r($total_hours/8);die;
    
    return view('files.user_import')->with(compact('data'));
}

public function importUserIntoDB(Request $request){

    $request->validate([
        'sample_file' => 'required','file','mimes:csv,xlsx,xls',
    ]);

    if($request->hasFile('sample_file')) {
        $pathinfo = pathinfo($_FILES["sample_file"]['name']);
        if (($pathinfo['extension'] == 'csv') 
               && $_FILES['sample_file']['size'] > 0 ) { 
        $arr = [];
        $date = [];
        $users = [];
        $attendanceData = [];
        $fileName = $request->file("sample_file");
        if ($request->file('sample_file')->getSize() > 0) {
            $file = fopen($fileName, "r");
            $i=0;
            $userID = 0;
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                if($i!==0){
                    
                    if((isset($column[2]) && !empty($column[2]))) {
                        $departmentID = 0;
                            
                        $countDept = Department::where('name','=',ucfirst($column[4]))->count();
                        if($countDept > 0){
                            $department = Department::where('name','=',ucfirst($column[4]))->first();
                            $departmentID = $department->id;
                        }else{
                            $department = new Department;
                            $department->name = ucfirst($column[4]);
                            $department->save();
                        }
                        $users = ['employee_code' => $column[2], 'first_name' => $column[3], 'department_id' => $departmentID];
                        $userID = $this->registerUser($users);
                       
                    }else{
                        
                       //insert data into attendance table with user  
                       $date = \Carbon\Carbon::createFromFormat('d/m/Y', $column[0]);
                       $month = \Carbon\Carbon::createFromFormat('d/m/Y',$column[0])->format('F');
                       
                       //checking if csv uploaded previously or not for same month
                       $attendanceCount = Attendance::where('user_id','=',$userID)->where('month','=',$month)->count();
                       if($attendanceCount > 1){
                            return back()->with('error','CSV file already uploaded for the month '.$month);
                       }

                       //calculating actual hours
                       $eight_hours = 28800;
                       $half_day = 14400;
                       $time = explode(':', $column[10]);
                       $actual_hours = $column[10];
                       
                       $total_sec= (int)$time[0]*3600 + (int)$time[0]*60;

                       if((int)$total_sec >= (int)$eight_hours){
                            $actual_hours = '08:00';
                       }
                       if($column[9]==="WO" || $column[9]==='NH'){
                            $actual_hours = '08:00';
                       }
                       if((int)$total_sec > $half_day && (int)$total_sec <= $eight_hours){
                            $actual_hours = '04:00';
                       }
                       //code end here

                       


                       $attendanceData[] = ['user_id' => $userID, 'date' => $date,'day' => $column[1]?$column[1]:'', 'in_time' => $column[5]?$column[5]:'00:00', 'out' => $column[6]?$column[6]:'00:00', 'late' => $column[7]?'00:'.$column[7]:'00:00','early' => $column[8]?'00:'.$column[8]:'00:00','status' => $column[9]?$column[9]:'','total_hour' => $column[10]?$column[10]:'00:00','month'=>$month,'actual_hours'=>$actual_hours];      
                    }
                }
            $i++;    
            }
            //print_r($attendanceData);die;
            
            if(!empty($attendanceData)){
                
                \DB::table('attendances')->insert($attendanceData);
                $this->processSalary();
                return back()->with('success','Records Inserted successfully.');
            }
            return back()->with('success','File imported successfully');
        }else{
            return back()->with('error','file is empty');
        }
      }else{
        return back()->with('error','Please select the excel file');
      }
    }
} 

private function registerUser($arr){
    if(!empty($arr)){
        $conditions = array('employee_code'=>$arr['employee_code']);
        $userCount = User::where($conditions)->count();

        if($userCount > 0){
            $userData = User::where($conditions)->first();
            return $userData->id;
        }else{
            $user = new User;
            $user->first_name = $arr['first_name'];
            $user->role_id = 4;
            $user->employee_code = $arr['employee_code'];
            $user->department_id = $arr['department_id'];
            $user->save();
            $currDate = \Carbon\Carbon::now()->format('Y-m-d');
            $this->getUsername($user->id,$currDate);
            return $user->id;    
        }
           
    }
}

public function getUsername($insert_id,$dob) {
        $username = date('Ymd',strtotime($dob)). $insert_id;
        $userRows  = User::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->get();
        $countUser = count($userRows) + 1;
        $username = ($countUser > 1) ? "{$username}-{$countUser}" : $username;
        $user = User::find($insert_id);
        $user->password_show = $username;
        $user->password = bcrypt($username);
        $user->username = $username;
        return $user->save();
    }

    public function getTotalSalary($userID){
      $user = User::find($userID);
      return $user;
    }

    public function getTotalLeaves($userID){
      $leaves = \DB::table("leave_applications")->where('approvedByPrincipal','=','Approved')->where('approvedByHOD','=','Approved')->where('leave_status','=','Active')->where('user_id','=',$userID)->get()->sum("days");
      
      if($leaves > 0){
        $leave = \App\LeaveApplication::where('approvedByPrincipal','=','Approved')->where('approvedByHOD','=','Approved')->where('leave_status','=','Active')->where('user_id','=',$userID)->first();
        $leave->leave_status = 'InActive';
        $leave->save();
      }

      return $leaves;



    }

    public function processSalary(){
       //salary calculation and insert it into payment table
       $users = User::where('role_id','!=','1')->get();
       foreach($users as $user){
           $attendanceCount = Attendance::where('user_id',$user->id)->count(); 
           
           if($attendanceCount > 0){
             $salary = $this->getTotalSalary($user->id);
             $basicSalary = $salary->salary;
             $grossSalary = $salary->gross_salary;
             $pfDeduction = $basicSalary*12/100;
             $profTaxDeduction = 200;
             $totalLeaves = $this->getTotalLeaves($user->id); 

             $total_time = Attendance::where('user_id',$user->id)->sum(\DB::raw("TIME_TO_SEC(actual_hours)"));

             $total_days = $total_time/3600;
             $total_days = $total_days/8;
             
             if($totalLeaves > 0){
                //code for deducting leaves
                 $this->deductLeave($user->id,$totalLeaves);
                //
                $total_days = $total_days + $totalLeaves;
             }
             $perDaySalary = round((int)$grossSalary/30);
             $totalNetSalary = round(($perDaySalary*$total_days) - round($pfDeduction) -$profTaxDeduction);

             $payment = new \App\Payment;
             $payment->user_id = $user->id;
             $payment->total_days = $total_days;
             $payment->total_leaves = $totalLeaves;
             $payment->pf_deduction = $pfDeduction;
             $payment->prof_tax_deduction = $profTaxDeduction;
             $payment->net_salary = $totalNetSalary;
             $payment->save();

             
         }
            

/*           echo "per day sal ".$perDaySalary."<br>";
           echo "total ".round($perDaySalary*$total_days)."<br>";
           echo "pf ".round($pfDeduction)."<br>";

           echo "totalNetSalary ".$totalNetSalary;die;
*/
      }
    //code end here
    }

    public function deductLeave($user_id,$total_leave){
        $user = User::find($user_id);
        $user->leave_count = $user->leave_count - $total_leave;
        return $user->save();
    }
}
