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
class UserController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function index(){
        $data['departments'] = Department::all();
        $data['users'] = User::paginate(env("LIMIT",10));
        return View('user.list')->with(compact('data'));
    }

    public function departmentFilter(Request $request){
        $data['departments'] = Department::all();
        $users = User::where('department_id','=',$request->department)->paginate(env("LIMIT", "10"))->appends(request()->query());
        $data['users'] = $users;
        return View('user.list')->with(compact('data'));
    }

    public function yearFilter(Request $request){

        $data['departments'] = Department::all();
        $users = User::where('joining_date','=',$request->joining_date)->paginate(env("LIMIT", "10"))->appends(request()->query());
        $data['users'] = $users;
        
        return View('user.list')->with(compact('data'));
    }


    /**
     * index showing the registration form.
     *
     * @return void
     */
    public function create()
    {
        $data['roles'] = Role::where('role', '!=' ,'admin')->get();
        $data['departments'] = Department::all();
        return View('user.create')->with(compact('data'));
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request)
    {

        $errors = $request->validate([
            'employee_code' => 'required|numeric|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|unique:users|max:10',
            'department_id' => 'required|numeric',
            'role' => 'required',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'adhar_number' => 'required|alpha_num',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
            'da' => 'required|numeric',
            'agp' => 'required|numeric',
            'profile_image'  => 'required','mimes:jpg,gif,jped,png','max:2048',
        ]);

        if($request->role == 2 || $request->role == 3){
            $conditions = array('department_id'=>$request->department_id,'role_id' => $request->role);
            $count = User::where($conditions)->count();

            $dataRec = User::where($conditions)->first();
            if($count > 0){
                if($request->role == 2){
                    $message = ucfirst($dataRec->role->role).' is already added for the this '.strtolower($dataRec->department->name).' department';    
                }else{
                    $message = ucfirst($dataRec->role->role).' is already added.';
                }
                return back()->with('error',$message)->withInput();
            }    
        }
        

        if($request->hasFile('profile_image')){
            if ($files = $request->file('profile_image')){
                // generate a new filename. getClientOriginalExtension() for the file extension
                $profilefile = 'profile-photo-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $profilefile = $files->storeAs('uploads', $profilefile);
            }
        }

        $data = $request->all();
        $user = new User();
        $user->employee_code = $data['employee_code'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->dob = date("Y-m-d",strtotime($data['dob']));;
        $user->department_id = $data['department_id'];
        $user->gender = $data['gender'];
        $user->adhar_number = $data['adhar_number'];
        $user->address = $data['address'];
        
        //salary calculation start here
        $user->salary = $data['salary'];
        $user->agp = $data['agp'];
        $user->da_percent = $data['da'];
        $user->hra_percent = 40;
        $total_da = floatval($data['salary']) * floatval($data['da'])/100;
        $user->total_da = $total_da;
        $total_hra = floatval($data['salary']) * floatval(40)/100;
        $user->total_hra = $total_hra;
        $user->gross_salary =  floatval($data['salary']) + floatval($total_hra) + floatval($total_da) + floatval($data['agp']);
        //salary calculation end here


        $user->joining_date = date("Y-m-d",strtotime($data['joining_date']));
        $user->role_id = $data['role'];
        $user->profile_image = $profilefile;

        
        $user->save();  
        $this->getUsername($user->id,$request->dob);
        /*$role = Role::where('role', $request->role)->first();
        
        $user->assignRole($role);*/
        return back()->with('success','User registration success');
        
    }

    public function edit($id){
        $data['roles'] = Role::where('role', '!=' ,'admin')->get();
        $data['departments'] = Department::all();
        $data['user'] = User::find($id);
        return View('user.edit')->with(compact('data'));
    }

    public function update(Request $request,$id){
        $errors = $request->validate([
            //'employee_code' => 'required|numeric',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required|unique:users,phone,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'department_id' => 'required|string',
            'role' => 'required',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'adhar_number' => 'required|alpha_num',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
            'da' => 'required|numeric',
            'agp' => 'required|numeric',
            
            
        ]);
        if($request->hasFile('profile_image')){
            $request->validate([
                'profile_image'  => 'required','mimes:jpg,gif,jped,png','max:2048', 
            ]);
        }

        if($request->hasFile('profile_image')){
            if ($files = $request->file('profile_image')){
                // generate a new filename. getClientOriginalExtension() for the file extension
                $profilefile = 'profile-photo-' . time() . '.' . $files->getClientOriginalExtension();
                // save to storage/app/photos as the new $filename
                $profilefile = $files->storeAs('uploads', $profilefile);
            }
        }

       
        $data = $request->all();
        $user = User::find($id);
        //$user->employee_code = $data['employee_code'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->dob = date("Y-m-d",strtotime($data['dob']));;
        $user->department_id = $data['department_id'];
        $user->gender = $data['gender'];
        $user->adhar_number = $data['adhar_number'];
        $user->address = $data['address'];
        
        //salary calculation start here
        $user->salary = $data['salary'];
        $user->agp = $data['agp'];
        $user->da_percent = $data['da'];
        $user->hra_percent = 40;
        $total_da = floatval($data['salary']) * floatval($data['da'])/100;
        $user->total_da = $total_da;
        $total_hra = floatval($data['salary']) * floatval(40)/100;
        $user->total_hra = $total_hra;
        $user->gross_salary =  floatval($data['salary']) + floatval($total_hra) + floatval($total_da) + floatval($data['agp']);
        //salary calculation end here



        $user->role_id = $data['role'];
        $user->joining_date = date("Y-m-d",strtotime($data['joining_date']));
        //$user->username = $this->getUsername($user->id,$request->dob);
        if($request->hasFile('profile_image')){
            $user->profile_image = $profilefile;
        }
        
        //$user->password = bcrypt(12345678);
        $user->save();
        $this->getUsername($id,$request->dob);
        /*//setting the role
        $role = Role::where('role', $request->role)->first();
        $user->assignRole($role);*/
        return back()->with('success','User Update successful');
    }

    public function getUsername($insert_id,$dob) {
        $username = date('Ymd',strtotime($dob)). $insert_id;
        $userRows  = User::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->get();
        $countUser = count($userRows) + 1;
        $username = ($countUser > 1) ? "{$username}-{$countUser}" : $username;
        $user = User::find($insert_id);
        $user->password_show = $username;
        $user->password = bcrypt($username);
        $user->username = $username;
        return $user->save();
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/list-users')->with('success', 'User deleted successful!');
    }

    public function show($id)
    {
        $user = User::find($id);
        return View('user.show')->with(compact('user'));
    }

    public function exportExel(){
        return Excel::download(new UserExport, 'list.xlsx');
    }

    public function listLeave(){
        $leaves = LeaveApplication::all();
        return View('HOD.leaves')->with(compact('leaves'));
    }

    public function approveLeave(Request $req, $id){
        $leaves = LeaveApplication::find($id);
        $leaves->approvedByHOD = 'Approved';
        $leaves->save();

        return redirect('/hod/list-leaves');
    }

    public function declineLeave(Request $req, $id){
        $leaves = LeaveApplication::find($id);
        $leaves->approvedByHOD = 'Decline';
        $leaves->save();

        
        return redirect('/hod/list-leaves');
    } 


    public function facultydepartmentFilter(Request $request){
        $data['departments'] = Department::all();
        $role = Role::where('role','=','teachers')->first();
        $users = User::where('role_id','=',$role->id)->where('email','!=','admin@gmail.com')->where('department_id','=',$request->department)->paginate(env("LIMIT", "10"))->appends(request()->query());
        $data['users'] = $users;
        return View('HOD.user-list')->with(compact('data'));
    }

    public function faculties(){
        $data['departments'] = Department::all();
        $role = Role::where('role','=','teachers')->first();
        $data['users'] = User::where('role_id','=',$role->id)->where('email','!=','admin@gmail.com')->paginate(env("LIMIT", "10"));
        return View('HOD.user-list')->with(compact('data'));
    }

    
}
