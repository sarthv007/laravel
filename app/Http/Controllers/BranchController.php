<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::all();
        return view('branch.list',compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View('branch.create');
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
            'name' => 'required|string',
        ]);
        
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->save();
        return redirect('/branch/list-branch')->with('success','Branch added success');
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
        $branch = Branch::find($id);
        return View('branch.edit')->with(compact('branch'));
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
            'name' => 'required|string'
        ]);
        
        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->save();
        return redirect('/branch/list-branch')->with('success','Branch updated success');
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
