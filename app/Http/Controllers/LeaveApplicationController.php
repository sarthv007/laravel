<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\LeaveApplication;
use App\Role;
use Illuminate\Http\Request;
use DateTime;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = LeaveApplication::where('user_id','=',auth()->user()->id)->paginate(env('LIMIT',10));
        return view('leaveApplication.list',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $role = Role::where('role','=','teachers')->first();	
       $uer_id = auth()->user()->id;
       $data['title'] = "Add New Leave";
       $data['users'] = User::where('role_id','=',$role->id)->where('id','!=',$uer_id)->get();
       return View('leaveApplication.create')->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = $request->validate([
            'ajustedFacultyName' => 'required',
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date' => 'required',
            'reason' => 'required|string',
        ]);
        
        $month_end_date = $request->start_date;
        $month_end_date = strtotime(date("Y-m-t", strtotime($month_end_date)));

        if(auth()->user()->leave_count == 0 ){
            return back()->with('error',"Sorry you don't have a balance leave pending");
        }

        if(strtotime($request->end_date) > $month_end_date){
            return back()->with('error','You can apply the leave for the same month only');
        }



        $leave = new LeaveApplication;
        $leave->reason = $request->reason;
        $leave->user_id = auth()->user()->id;
        

        $datetime1 = new DateTime($request->start_date);
		$datetime2 = new DateTime($request->end_date);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
        if($days == 0)
        $days = 1;
		$leave->days = $days;
        $leave->ajustedFacultyName = $request->ajustedFacultyName;
        $leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $leave->save();
        return redirect('leave-application/list-leave-application')->with('success','Leave applied successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $role = Role::where('role','=','teachers')->first();	
       $uer_id = auth()->user()->id;
       $data['title'] = "Add New Leave";
       $data['users'] = User::where('role_id','=',$role->id)->where('id','!=',$uer_id)->get();
       $data['leave'] = LeaveApplication::find($id);	
       return View('leaveApplication.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = $request->validate([
            'ajustedFacultyName' => 'required',
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date' => 'required',
            'reason' => 'required|string',
        ]);
        
        

        $leave = LeaveApplication::find($id);
        $leave->reason = $request->reason;
        $leave->user_id = auth()->user()->id;
        

        $datetime1 = new DateTime($request->start_date);
		$datetime2 = new DateTime($request->end_date);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
		$leave->days = $days;
        $leave->ajustedFacultyName = $request->ajustedFacultyName;
        $leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $leave->save();
        return redirect('/leave-application/list-leave-application')->with('success','Leave update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect('/branch/list-branch')->with('success','Branch deleted success');
    }
}
