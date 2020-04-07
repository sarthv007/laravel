<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Branch;
use App\Http\Controllers\Controller;



class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::paginate(env("LIMIT", "10"));
        return view('notice.list',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['branchs'] = Branch::all(); 
       return View('notice.create')->with(compact('data'));
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
            'semister' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'year' => 'required|numeric',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->branch_id = $request->branch_id;
        $notice->semister = $request->semister;
        $notice->year = $request->year;
        $notice->body = $request->body;
        $notice->user_id = auth()->user()->id;
        $notice->save();
        return redirect('/notice/list-notice')->with('success','Notice added success');
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
        $data['branchs'] = Branch::all(); 
        $data['notice'] = Notice::find($id);
        return View('notice.edit')->with(compact('data'));
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
            'semister' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'year' => 'required|numeric',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->branch_id = $request->branch_id;
        $notice->semister = $request->semister;
        $notice->year = $request->year;
        $notice->body = $request->body;
        $notice->user_id = auth()->user()->id;
        $notice->save();
        return redirect('/notice/list-notice')->with('success','Notice updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect('/notice/list-notice')->with('success','Notice deleted success');
    }
}
