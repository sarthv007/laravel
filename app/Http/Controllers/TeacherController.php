<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;

class TeacherController extends Controller
{
    public function edit(){
    	$data['roles'] = Role::where('role', '!=' ,'admin')->get();
        $data['departments'] = Department::all();
    	$data['user'] = User::find(auth()->user()->id);
    	$data['title'] = "Update Teachers Profile";
    	return View('teachers.edit-profile')->with(compact('data'));
    }

    public function update(Request $request,$id){
    	$errors = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required',
            //'email' => 'required|string|email',
            'phone' => 'required|max:10',
            'department_id' => 'required|string',
            //'role' => 'required',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'adhar_number' => 'required|alpha_num',
            //'joining_date' => 'required|date',
            //'salary' => 'required|numeric',
            
        ]);
        if($request->hasFile('profile_image')){
            $request->validate([
                'profile_image'  => 'required','mimes:jpg,gif,jped,png','max:2048', 
            ]);
        }

       	if($request->hasFile('profile_image')){
            if ($files = $request->file('profile_image')) {
               $profilefile = 'profile-photo-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $profilefile = $files->storeAs('uploads', $profilefile);
           }
        }

        $data = $request->all();
        $user = User::find($id);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        //$user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->dob = date("Y-m-d",strtotime($data['dob']));;
        $user->department_id = $data['department_id'];
        $user->gender = $data['gender'];
        $user->adhar_number = $data['adhar_number'];
        $user->address = $data['address'];
        //$user->salary = $data['salary'];
        //$user->role_id = $data['role'];
        //$user->joining_date = date("Y-m-d",strtotime($data['joining_date']));
        //$user->username = $this->getUsername($user->id,$request->dob);
        if($request->hasFile('profile_image')){
            $user->profile_image = $profilefile;
        }
        $user->save();
        
        return back()->with('success','User Update successful');
    }

    public function salaryDetails(){
        $data['salary'] = User::where('role_id', '!=' ,'1')->where('id','=',auth()->user()->id)->first();
        //print_r($data);die;
        return View('teachers.show-salary')->with(compact('data'));
    }

    public function attendance(){
        $month = \Carbon\Carbon::now()->format('F');
        $attendance = \App\Attendance::where('user_id','=',auth()->user()->id)->where('month','=',$month)->get();
        return View('attendance.show')->with(compact('attendance'));
    }

    public function attendanceByMonth(Request $req){
        $month = $req->month;
        $attendance = \App\Attendance::where('user_id','=',auth()->user()->id)->where('month','=',$month)->get();
        return View('attendance.show')->with(compact('attendance'));   
    }

    public function salarySleep(){
        $payments = \App\Payment::where('user_id',auth()->user()->id)->first()?\App\Payment::where('user_id',auth()->user()->id)->first():[];
        return View('teachers.salary-sleep')->with(compact('payments'));
    }

}
