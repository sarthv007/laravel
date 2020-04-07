<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\LeaveApplication;

class PrincipalController extends Controller
{
    public function listLeave(){
        $leaves = LeaveApplication::all();
        return View('principal.leaves')->with(compact('leaves'));
    }

    public function approveLeave(Request $req, $id){
        $leaves = LeaveApplication::find($id);
        $leaves->approvedByPrincipal = 'Approved';
        $leaves->save();

        return redirect('/principal/list-leaves');
    }

    public function declineLeave(Request $req, $id){
        $leaves = LeaveApplication::find($id);
        $leaves->approvedByPrincipal = 'Decline';
        $leaves->save();

        
        return redirect('/principal/list-leaves');
    } 


    public function facultydepartmentFilter(Request $request){
        $data['departments'] = Department::all();
        $role = Role::where('role','=','teachers')->first();
        $users = User::where('role_id','=',$role->id)->where('email','!=','admin@gmail.com')->where('department_id','=',$request->department)->paginate(env("LIMIT", "10"))->appends(request()->query());
        $data['users'] = $users;
        return View('principal.user-list')->with(compact('data'));
    }

    public function faculties(){
        $data['departments'] = Department::all();
        $role = Role::where('role','=','teachers')->first();
        $data['users'] = User::where('role_id','=',$role->id)->where('email','!=','admin@gmail.com')->paginate(env("LIMIT", "10"));
        return View('principal.user-list')->with(compact('data'));
    }
}
