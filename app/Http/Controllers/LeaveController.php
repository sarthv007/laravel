<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
            $this->middleware(function ($request, $next) {
                $this->user = Auth::user();
                if($this->user->role->role !== 'admin'){
                   return back()->with('unauth','not allow');     
                }
                return $next($request);
            });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::all();
        return view('leave.list',compact('leaves',$leaves));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
        ]);
        
        $leave = new Leave();
        $leave->type = $request->type;
        $leave->save();
        return redirect('/leave/list-leaves')->with('success','Leave type added success');
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
        $leave = Leave::find($id);
        return View('leave.edit')->with(compact('leave'));
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
        $request->validate([
            'type' => 'required|string',
        ]);
        
        $leave = Leave::find($id);
        $leave->type = $request->type;
        $leave->save();
        return redirect('/leave/list-leaves')->with('success','Leave type added success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        return redirect('/leave/list-leaves')->with('success','Leave type deleted success');
    }
}
