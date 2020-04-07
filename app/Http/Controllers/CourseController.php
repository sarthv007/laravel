<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Branch;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.list',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['branchs'] = Branch::all();		
       return View('course.create')->with(compact('data'));
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
            'courseType' => 'required|string',
            'branch_id' => 'required|numeric',
            'year' => 'required|numeric',
            'tution_fees' => 'required',
            'development_fees' => 'required',
        ]);
        $conditions = ['branch_id' => $request->branch_id, 'courseType' => $request->courseType, 'year' => $request->year, ];
        $records = Course::where($conditions)->count();
        if($records > 0){
            return back()->with('error','Course already added');
        }

        $course = new Course();
        $course->courseType = $request->courseType;
        $course->branch_id = $request->branch_id;
        $course->year = $request->year;
        $course->tution_fees = $request->tution_fees;
        $course->development_fees = $request->development_fees;
        $course->total_fees = $request->tution_fees + $request->development_fees;
        $course->save();
        return redirect('/course/list-courses')->with('success','Course added success');
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
        $data['course'] = Course::find($id);
		$data['branchs'] = Branch::all();        
			
        return View('course.edit')->with(compact('data'));
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
            'courseType' => 'required|string',
            'branch_id' => 'required|numeric',
            'year' => 'required|numeric',
            'tution_fees' => 'required',
            'development_fees' => 'required',
        ]);

        $conditions = ['branch_id' => $request->branch_id, 'courseType' => $request->courseType, 'year' => $request->year, ];
        $records = Course::where($conditions)->count();
        if($records > 1){
            return back()->with('error','Course already added');
        } 
        
        $course = Course::find($id);
        $course->courseType = $request->courseType;
        $course->branch_id = $request->branch_id;
        $course->year = $request->year;
        $course->tution_fees = $request->tution_fees;
        $course->development_fees = $request->development_fees;
        $course->total_fees = $request->tution_fees + $request->development_fees;
        $course->save();
        return redirect('/course/list-courses')->with('success','Course updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/course/list-courses')->with('success','Course deleted success');
    }
}

