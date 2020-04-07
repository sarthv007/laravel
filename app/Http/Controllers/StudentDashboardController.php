<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DownloadReason;
use App\Result;
use App\Student;
use App\Notice;
use App\Branch;
use App\Course;

class StudentDashboardController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function dashboard(){
    	return view('studentdashboard.home');
    }

    public function results(){
    	$conditions['branch_id'] = auth()->user()->branch;
    	$conditions['year'] = auth()->user()->year;
    	$conditions['semister'] = auth()->user()->semister;
    	$conditions['doc_type'] = 'results';
    	$data['title'] = "Results";
    	$data['results'] = Result::where($conditions)->get();
    	return View('studentdashboard.result')->with(compact('data'));
    }

    public function assignments(){
    	$conditions['branch_id'] = auth()->user()->branch;
    	$conditions['year'] = auth()->user()->year;
    	$conditions['semister'] = auth()->user()->semister;
    	$conditions['doc_type'] = 'assignment';
    	$data['title'] = "Assignment";
    	$data['results'] = Result::where($conditions)->get();
    	return View('studentdashboard.result')->with(compact('data'));
    }

    public function attendance(){
    	$conditions['branch_id'] = auth()->user()->branch;
    	$conditions['year'] = auth()->user()->year;
    	$conditions['semister'] = auth()->user()->semister;
    	$conditions['doc_type'] = 'attendance';
    	$data['title'] = "Attendance";
    	$data['results'] = Result::where($conditions)->get();
    	return View('studentdashboard.result')->with(compact('data'));
    }

    public function fees(){
        $data['title'] = "Academics Fees";
        $conditions = ['id' => auth()->user()->course_id, 'branch_id' => auth()->user()->branch, 'year' => auth()->user()->year];
        $data['fees'] = Course::where($conditions)->first();
        $data['feesStatus'] = \App\StudentFee::where('student_id','=',auth()->user()->id)->where('course_id','=',auth()->user()->course_id)->first();
        return View('studentdashboard.show-fees')->with(compact('data'));
    }

    public function announcement(){
        $conditions['branch_id'] = auth()->user()->branch;
        $conditions['year'] = auth()->user()->year;
        $conditions['semister'] = auth()->user()->semister;
        $data['title'] = "Announcement";
        $data['notices'] = Notice::where($conditions)->get();
        return View('studentdashboard.announcement')->with(compact('data'));
    }

    public function editProfile(){
        $current_user_id = auth()->user()->id;
        $data['student'] = Student::find($current_user_id);  
        $data['FeesDetails'] = Course::find($data['student']->course_id);
        $data['branchs'] = Branch::all();        
        return View('studentdashboard.edit')->with(compact('data'));
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
            'roll_number' => 'required|numeric',
            'address' => 'required',
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
       
        $data = $request->all();
        $student = Student::find($id);
        $student->first_name = $data['first_name'];
        $student->last_name = $data['last_name'];
        $student->father_name = $data['father_name'];
        $student->mother_name = $data['mother_name'];
        //$student->email = $data['email'];
        //$student->phone = $data['phone'];
        $student->dob = date("Y-m-d",strtotime($data['dob']));;
        //$student->branch = $data['branch'];
        //$student->year = $data['year'];
        //$student->semister = $data['semister'];
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

        $student->password = bcrypt(12345678);
        $student->save();
        return redirect('student-profile')->with('success', 'Student account update successful!');
    }

    public function docs(){
        $data['user'] = auth()->user();
        $data['title'] = "Student Documents";
        return View('studentdashboard.docs')->with(compact('data'));
    }

    public function downloadFiles(Request $request){
        $request->validate([
            'download_reason' => 'required',
        ]);    
        $data['user_name'] = auth()->user()->first_name." ".auth()->user()->last_name;
        $data['user_id'] = auth()->user()->id;
        $arr = explode('/',$request->path);
        $data['document'] = end($arr);


        $download = new DownloadReason;
        $download->reason = $request->download_reason;
        $download->details = serialize($data);
        $download->save();
        
        //code for the file download
        $file = public_path().'/storage/'.$request->path;
        
        $headers = array(
                  'Content-Type: '.mime_content_type( $file ),
                );
        return response()->download($file, 'file.jpg', $headers);
        
    }

    public function donwloadReason($path){
        $user = auth()->user();
        if($path ==1){
            $docs = $user->sscMarksheet;    
        }elseif($path ==2){
            $docs = $user->hscMarksheet;
        }elseif($path ==2){
            $docs = $user->diplomaMarksheet;
        }else{
            $docs = $user->leaveCirtficates;
        }
        $data['title'] = "Document download reason"; 
        $data['docs'] = $docs;
        $data['path'] = $path;
        return View('studentdashboard.dreason')->with(compact('data'));
    }
}
