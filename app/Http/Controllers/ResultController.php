<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Branch;


class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$data['results'] = Result::all();
        return View('result.list')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['branchs'] = Branch::all();		
       return View('result.create')->with(compact('data'));
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
        	'doc_type' => 'required|string',
            'branch_id' => 'required|numeric',
           	'year' => 'required|numeric',
            'result_file'  => 'required','mimes:jpg,gif,jped,png','max:2048',
        ]);

        if ($files = $request->file('result_file')) {
           $destinationPath = public_path('uploads/results'); // upload path
           $resultFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $resultFile);
           
        }
        
        $result = new Result();
        $result->branch_id = $request->branch_id;
        $result->year = $request->year;
        $result->semister = $request->semister;
        $result->doc_type = $request->doc_type;
        $result->file = $resultFile;
        $result->user_id = auth()->user()->id;
        $result->save();
        return redirect('/result/list-results')->with('success','Result added success');
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
        $data['result'] = Result::find($id);
        return View('result.edit')->with(compact('data'));
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
        	'doc_type' => 'required|string',
            'branch_id' => 'required|numeric',
           	'year' => 'required|numeric',
            
        ]);

        if($request->hasFile('result_file')){
	        if ($files = $request->file('result_file')) {
	           $destinationPath = public_path('uploads/results'); // upload path
	           $resultFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
	           $files->move($destinationPath, $resultFile);
	           
	        }
        }
        $result = Result::find($id);
        $result->branch_id = $request->branch_id;
        $result->year = $request->year;
        $result->semister = $request->semister;
        $result->doc_type = $request->doc_type;
        
        if($request->hasFile('result_file')){
        	$result->file = $resultFile;
    	}
        $result->user_id = auth()->user()->id;
        $result->save();
        return redirect('/result/list-results')->with('success','Result updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::find($id);
        $result->delete();
        return redirect('/result/list-results')->with('success','Result deleted success');
    }
}
