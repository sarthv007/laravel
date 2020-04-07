<?php

namespace App\Http\Controllers;

use App\Student;
use App\Department;
use App\Branch;
use App\Course;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\StudentFee;
class StudentController extends Controller
{
    public function index(Request $request){

        $data['students'] = Student::paginate(env("LIMIT", "10"));	
    	$data['branchs'] = Branch::all();
        $data['courses'] = Course::all();
        return View('student.list')->with(compact('data'));
    }

    public function filterByBranch(Request $request){
        $data['students'] = Student::where('branch','=',$request->branch)->paginate(env("LIMIT", "10"))->appends(request()->query());
        $data['branchs'] = Branch::all();
        return View('student.list')->with(compact('data'));
    }

    public function yearFilter(Request $request){
        $data['students'] = Student::where('year','=',$request->year)->paginate(env("LIMIT", "10"))->appends(request()->query());
    	$data['branchs'] = Branch::all();
        return View('student.list')->with(compact('data'));
    }

    /**
     * index showing the registration form.
     *
     * @return void
     */
    public function create()
    {
        //$data['roles'] = Role::where('role', '!=' ,'admin')->get();
        $data['branchs'] = Branch::all();
        return View('student.create')->with(compact('data'));
    }

    private function _validate(Request $request){
    	$errors = $request->validate([
            'first_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|numeric',
            'semister' => 'required|numeric',
            'roll_number' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|string|email|unique:students',
            'phone' => 'required|unique:students|max:10',
            'course_id' => 'required|string',
            'branch' => 'required|numeric',
            'year' => 'required|numeric',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'adhar_number' => 'required|alpha_num',
            'profile_image'  => 'required','mimes:jpg,gif,jped,png',
            'ssc_marksheet'  => 'required','mimes:jpg,gif,jped,png,pdf',
            'hsc_marksheet'  => 'required','mimes:jpg,gif,jped,png,pdf',
            'diploma_marksheet'  => 'required','mimes:jpg,gif,jped,png,pdf',
            'leave_cirtficates'  => 'required','mimes:jpg,gif,jped,png,pdf',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request)
    {

    	$this->_validate($request);
        
        if($request->hasFile('profile_image')){
            if ($files = $request->file('profile_image')) {
                $profilefile = 'profile-photo-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $profilefile = $files->storeAs('uploads/students', $profilefile);
               
            }
        }

        if($request->hasFile('ssc_marksheet')){
            if ($files = $request->file('ssc_marksheet')) {
               $sscMarksheet = 'ssc-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $sscMarksheet = $files->storeAs('uploads/students/documents/ssc', $sscMarksheet);
            }
        }
        if($request->hasFile('hsc_marksheet')){
            if ($files = $request->file('hsc_marksheet')) {
               $hscMarksheet = 'hsc-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $hscMarksheet = $files->storeAs('uploads/students/documents/hsc', $hscMarksheet);
           }    
        }

        if($request->hasFile('diploma_marksheet')){
            if ($files = $request->file('diploma_marksheet')) {
               $diplomaMarksheet = 'diploma-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $diplomaMarksheet = $files->storeAs('uploads/students/documents/diploma', $diplomaMarksheet);
           }    
        }
        if($request->hasFile('leave_cirtficates')){
            if ($files = $request->file('leave_cirtficates')) {
               $leaveCirtficates = 'leaving-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $leaveCirtficates = $files->storeAs('uploads/students/documents/leaving', $leaveCirtficates);
           }
        }


        $conditions = ['branch_id' => $request->branch, 'courseType' => $request->course_id, 'year' => $request->year, ];
        $count = Course::where($conditions)->count();
        $course_id = 0;
        
        if($count == 0){
            return back()->with('error','Please add the course first')->withInput();
        }else{
            $course = Course::where($conditions)->first();
            $course_id = $course->id;
        }
        
        $data = $request->all();
        $student = new Student();
        $student->first_name = $data['first_name'];
        $student->last_name = $data['last_name'];
        $student->father_name = $data['father_name'];
        $student->mother_name = $data['mother_name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->dob = date("Y-m-d",strtotime($data['dob']));
        $student->course_id = $course_id;
        $student->courseType = $request->course_id;
        $student->branch = $data['branch'];
        $student->year = $data['year'];
        $student->semister = $data['semister'];
        $student->gender = $data['gender'];
        $student->roll_number = $data['roll_number'];
        $student->state = $data['state'];
        $student->city = $data['city'];
        $student->pincode = $data['pincode'];
        $student->adhar_number = $data['adhar_number'];
        $student->address = $data['address'];
        $student->profile_image = $profilefile;
        $student->sscMarksheet = $sscMarksheet;
        $student->hscMarksheet = $hscMarksheet;
        $student->diplomaMarksheet = $diplomaMarksheet;
        $student->leaveCirtficates = $leaveCirtficates;
        $student->save();
        $this->getUsername($student->id,$request->dob,$request->branch);

        //inserting fees details
        $fees = new StudentFee;
        $fees->student_id = $student->id;
        $fees->course_id =  $course_id;
        $fees->save();
        return redirect('student/list-students')->with('success','Student registration success');
        
    }

    public function edit($id){
        $data['student'] = Student::find($id);
        $data['FeesDetails'] = Course::find($data['student']->course_id);	
    	$data['branchs'] = Branch::all();        
    	return View('student.edit')->with(compact('data'));
    }

    public function update(Request $request,$id){
    	$errors = $request->validate([
            'first_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|numeric',
            'course_id' => 'required|string',
            'semister' => 'required|numeric',
            'roll_number' => 'required|numeric',
            'address' => 'required',
            //'email' => 'required|string|email',
            //'phone' => 'required|max:10',
            'branch' => 'required',
            'year' => 'required|numeric',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'adhar_number' => 'required|alpha_num',
        ]);
        
        if($request->hasFile('profile_image')){
            $request->validate([
                'profile_image'  => 'required','mimes:jpg,gif,jped,png',
            ]);

            if ($files = $request->file('profile_image')) {
                $profilefile = 'profile-photo-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $profilefile = $files->storeAs('uploads/students', $profilefile);
               
            }
        }
        if($request->hasFile('ssc_marksheet')){
            $request->validate([
                'ssc_marksheet'  => 'required','mimes:jpg,gif,jped,png',
            ]);

            if ($files = $request->file('ssc_marksheet')) {
               $sscMarksheet = 'ssc-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $sscMarksheet = $files->storeAs('uploads/students/documents/ssc', $sscMarksheet);
            }
        }

        if($request->hasFile('hsc_marksheet')){
            $request->validate([
                'hsc_marksheet'  => 'required','mimes:jpg,gif,jped,png',
            ]);

            if ($files = $request->file('hsc_marksheet')) {
               $hscMarksheet = 'hsc-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $hscMarksheet = $files->storeAs('uploads/students/documents/hsc', $hscMarksheet);
           }    
        }

        if($request->hasFile('diploma_marksheet')){
            $request->validate([
                'diploma_marksheet'  => 'required','mimes:jpg,gif,jped,png',
            ]);

            if ($files = $request->file('diploma_marksheet')) {
               $diplomaMarksheet = 'diploma-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $diplomaMarksheet = $files->storeAs('uploads/students/documents/diploma', $diplomaMarksheet);
           }    
        }
        if($request->hasFile('leave_cirtficates')){
            $request->validate([
                'leave_cirtficates'  => 'required','mimes:jpg,gif,jped,png',
            ]);
            if ($files = $request->file('leave_cirtficates')) {
               $leaveCirtficates = 'leaving-marksheet-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $leaveCirtficates = $files->storeAs('uploads/students/documents/leaving', $leaveCirtficates);
           }
        }

        $conditions = ['branch_id' => $request->branch, 'courseType' => $request->course_id, 'year' => $request->year, ];
        $count = Course::where($conditions)->count();
        $course_id = 0;
        
        if($count == 0){
            return back()->with('error','Please add the course first')->withInput();
        }else{
            $course = Course::where($conditions)->first();
            $course_id = $course->id;
        }
       
        $data = $request->all();
        $student = Student::find($id);
        $student->first_name = $data['first_name'];
        $student->last_name = $data['last_name'];
        $student->father_name = $data['father_name'];
        $student->mother_name = $data['mother_name'];
        //$student->email = $data['email'];
        //$student->phone = $data['phone'];
        $student->dob = date("Y-m-d",strtotime($data['dob']));;
        $student->course_id = $course_id;
        $student->courseType = $data['course_id'];
        $student->branch = $data['branch'];
        $student->year = $data['year'];
        $student->semister = $data['semister'];
        $student->gender = $data['gender'];
        $student->roll_number = $data['roll_number'];
        $student->state = $data['state'];
        $student->city = $data['city'];
        $student->pincode = $data['pincode'];
        $student->adhar_number = $data['adhar_number'];
        $student->address = $data['address'];
        
        if($request->hasFile('profile_image')){
        	$student->profile_image = $profilefile;
    	}

        if($request->hasFile('ssc_marksheet')){
            $student->sscMarksheet = $sscMarksheet;
        }
        if($request->hasFile('hsc_marksheet')){
            $student->hscMarksheet = $hscMarksheet;
        }
        if($request->hasFile('diploma_marksheet')){
            $student->diplomaMarksheet = $diplomaMarksheet;
        }
        if($request->hasFile('leave_cirtficates')){
            $student->leaveCirtficates = $leaveCirtficates;
        }

        $student->save();
        return redirect('/student/list-students')->with('success', 'Student account update successful!');
    }

    public function destroy($id)
    {
        $user = Student::find($id);
        $user->delete();

        return redirect('/student/list-students')->with('success', 'Student account deleted successful!');
    }

    public function show($id)
    {
        $data['student'] = Student::find($id);
        $data['FeesDetails'] = Course::find($data['student']->course_id);
        return View('student.show')->with(compact('data'));
    }

    public function exportExel(){
        return Excel::download(new StudentExport, 'list.xlsx');
    }
    
    public function getFees(Request $request){
        $conditions = ['branch_id' => $request->branch, 'courseType' => $request->courseType, 'year' => $request->year, ];
        $count = Course::where($conditions)->count();
        #print_r($conditions);die;
        $data = array();
        if($count > 0){
            $course = Course::where($conditions)->first();
            $data['tution_fees'] = $course->tution_fees;
            $data['development_fees'] = $course->development_fees;
            $data['total_fees'] = $course->total_fees;
            $data['count'] = 1;
        }else{
            $data['count'] = 0;    
        }
        
        return $data;die;
    }   

    public function showFees(){
        $students = Student::all();
        return View('student.fees')->with(compact('students'));
    }

    public function getUsername($insert_id,$dob,$branch_id) {
        $branch_name = $this->getBranch($branch_id);
        $username = str_replace(' ', '_', $branch_name). date('Y',strtotime($dob)). $insert_id;

        $userRows  = Student::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->get();
        $countUser = count($userRows) + 1;
        $username = ($countUser > 1) ? "{$username}-{$countUser}" : $username;
        $user = Student::find($insert_id);
        $user->password_show = 12312312;
        $user->password = bcrypt(12312312);
        $user->username = $username;
        return $user->save();
    }

    public function getBranch($branch_id){
        $branch = Branch::find($branch_id);
        return $branch->name;
    }

    public function updateFees($id){
        $students = Student::find($id);
        return View('student.feesupdate')->with(compact('students'));
    }

    public function feesUpdate(Request $request,$id){
        $errors = $request->validate([
            'FeesPaid' => 'required|numeric',
        ]);
        $fee = \App\studentFee::where('student_id',$request->student_id)->where('course_id',$request->course_id)->first();
        $fee->FeesPaid = $request->FeesPaid;
        $fee->FeesRemain = $request->total_fees - $request->FeesPaid;
        $fee->status = 'Paid';
        $fee->save();
        
        $students = Student::all();
        return View('student.fees')->with(compact('students'))->with('success','Fees updated success');;

    }
}


