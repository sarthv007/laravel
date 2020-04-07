<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['employee'] = User::where('email','!=','admin@gmail.com')->count();
        $data['student'] = Student::count();
        $todayDay = \Carbon\Carbon::now()->format('d');
        $todayMonth = \Carbon\Carbon::now()->format('m');

        $data['employee_birthday'] = User::whereDay('dob', '=', $todayDay)->whereMonth('dob', '=', $todayMonth)->count();

        $data['student_birthday'] = Student::whereDay('dob', '=', $todayDay)->whereMonth('dob', '=', $todayMonth)->count();

        return view('home')->with(compact('data'));
    }

    public function employeeBirth()
    {
        $todayDay = \Carbon\Carbon::now()->format('d');
        $todayMonth = \Carbon\Carbon::now()->format('m');

        $data['employee_birthday'] = User::whereDay('dob', '=', $todayDay)->whereMonth('dob', '=', $todayMonth)->get();

        /*$data['student_birthday'] = Student::whereDay('dob', '=', $todayDay)->whereMonth('dob', '=', $todayMonth)->count();
*/
        return view('home.show')->with(compact('data'));
    }

    public function studentBirth()
    {
        $todayDay = \Carbon\Carbon::now()->format('d');
        $todayMonth = \Carbon\Carbon::now()->format('m');

        $data['student_birthday'] = Student::whereDay('dob', '=', $todayDay)->whereMonth('dob', '=', $todayMonth)->get();

        return view('home.student-birthday')->with(compact('data'));
    }
    
}
