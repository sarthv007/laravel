<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/get', function () {
    	$users = App\User::find(10)->roles;
        $role = "";
        foreach($users as $role){
        	$role = $role->name;
        }
        return View('welcome')->with('roles',$users);
});*/

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/student-dashboard', 'StudentDashboardController@dashboard')->name('student-dashboard');



/*Route::get('/articles/exportExcel','PostsController@exportExcel');
// Export to csv
Route::get('/articles/exportCSV','PostsController@exportCSV');*/


Route::group(['middleware' => ['auth']], function () {
    Route::get('/download-reason',function(){
        $data['records'] = App\DownloadReason::all();
        $data['title'] = "Download Reasons"; 
        //print_r($data);die;
        return View('download.show')->with(compact('data'));
    });

    Route::get('/create', 'UserController@create');
    Route::post('/store', 'UserController@store');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::post('/update/{id}', 'UserController@update');
    Route::get('/list-users', 'UserController@index');
    Route::delete('/delete/user/{id}', 'UserController@destroy');
    Route::get('/show/{id}/user', 'UserController@show');
    Route::get('/filter-by-dept', 'UserController@departmentFilter');
    Route::get('/filter-by-year', 'UserController@yearFilter');
    Route::get('/export-users', 'UserController@exportExel');
    
    

    //routes for the students 
    Route::get('/student/create', 'StudentController@create');
    Route::post('/student/store', 'StudentController@store');
    Route::get('/edit/{id}/student', 'StudentController@edit');
    Route::post('/update/{id}/student', 'StudentController@update');
    Route::get('/student/list-students', 'StudentController@index');
    Route::delete('/delete/{id}/student', 'StudentController@destroy');
    Route::get('/show/{id}/student', 'StudentController@show');
    Route::get('/student/filter-branch', 'StudentController@filterByBranch');
    Route::get('/student/filter-year', 'StudentController@yearFilter');
    Route::get('/export-stud', 'StudentController@exportExel');
    Route::post('/student/getFees', 'StudentController@getFees');
    Route::get('/student/fees', 'StudentController@showFees');
    Route::get('/update-fees/{id}', 'StudentController@updateFees');
    Route::post('/update/{id}/fees', 'StudentController@feesUpdate');
    

        
    //leave
    Route::get('/leave/create', 'LeaveController@create');
    Route::post('/leave/store', 'LeaveController@store');
    Route::get('/leave/list-leaves', 'LeaveController@index');
    Route::get('/edit/{id}/leave', 'LeaveController@edit');
    Route::post('/leave/{id}/update', 'LeaveController@update');
    Route::delete('/delete/{id}/leave', 'LeaveController@destroy');
    
    //Notice
    Route::get('/notice/create', 'NoticeController@create');
    Route::post('/notice/store', 'NoticeController@store');
    Route::get('/notice/list-notice', 'NoticeController@index');
    Route::get('/edit/{id}/notice', 'NoticeController@edit');
    Route::post('/notice/{id}/update', 'NoticeController@update');
    Route::delete('/delete/{id}/notice', 'NoticeController@destroy');
    
    //routes for the branches
    Route::get('/branch/create', 'BranchController@create');
    Route::post('/branch/store', 'BranchController@store');
    Route::get('/branch/list-branch', 'BranchController@index');
    Route::get('/edit/{id}/branch', 'BranchController@edit');
    Route::post('/branch/{id}/update', 'BranchController@update');
    Route::delete('/delete/{id}/branch', 'BranchController@destroy');

    //routes for the departments
    Route::get('/department/create', 'DepartmentController@create');
    Route::post('/department/store', 'DepartmentController@store');
    Route::get('/department/list-departments', 'DepartmentController@index');
    Route::get('/edit/{id}/department', 'DepartmentController@edit');
    Route::post('/department/{id}/update', 'DepartmentController@update');
    Route::delete('/delete/{id}/department', 'DepartmentController@destroy');

    //routes for the results
    Route::get('/result/create', 'ResultController@create');
    Route::post('/result/store', 'ResultController@store');
    Route::get('/result/list-results', 'ResultController@index');
    Route::get('/edit/{id}/result', 'ResultController@edit');
    Route::post('/result/{id}/update', 'ResultController@update');
    Route::delete('/delete/{id}/result', 'ResultController@destroy');

    //routes for the Leave Applications
    Route::get('/leave-application/create', 'LeaveApplicationController@create');
    Route::post('/leave-application/store', 'LeaveApplicationController@store');
    Route::get('/leave-application/list-leave-application', 'LeaveApplicationController@index');
    Route::get('/edit/{id}/leave-application', 'LeaveApplicationController@edit');
    Route::post('/leave-application/{id}/update', 'LeaveApplicationController@update');
    Route::delete('/delete/{id}/leave-application', 'LeaveApplicationController@destroy');

    //routes for the update employee profile
    Route::get('/employee/profile', 'TeacherController@edit');
    Route::post('/employee-profile/{id}/update', 'TeacherController@update');

    //route for the employee attendance
    Route::get('/employee/attendance', 'TeacherController@attendance');
    Route::post('/employee/attendanceByMonth', 'TeacherController@attendanceByMonth');
        

    //routes for the salary details for the teachers
    Route::get('/employee/salary-details', 'TeacherController@salaryDetails');
    Route::get('/employee/salary-sleep', 'TeacherController@salarySleep');

    //routes for the update employee profile
    Route::get('/hod/list-leaves', 'UserController@listLeave');
    Route::get('leave-approve/{id}/approve', 'UserController@approveLeave');
    Route::get('leave-decline/{id}/decline', 'UserController@declineLeave');
    Route::get('/hod/faculties', 'UserController@faculties');
    Route::get('/hod/filter-by-dept', 'UserController@facultydepartmentFilter');


    //routes for principal
    Route::get('/principal/list-leaves', 'PrincipalController@listLeave');
    Route::get('/pricipal/{id}/approve', 'PrincipalController@approveLeave');
    Route::get('/pricipal/{id}/decline', 'PrincipalController@declineLeave');
    Route::get('/principal/faculties', 'PrincipalController@faculties');
    Route::get('/principal/filter-by-dept', 'PrincipalController@facultydepartmentFilter');
    

    //routes for the course
    Route::get('/course/create', 'CourseController@create');
    Route::post('/course/store', 'CourseController@store');
    Route::get('/course/list-courses', 'CourseController@index');
    Route::get('/edit/{id}/course', 'CourseController@edit');
    Route::post('/course/{id}/update', 'CourseController@update');
    Route::delete('/delete/{id}/course', 'CourseController@destroy');

    //route for the user import
    Route::get('/import-user','FileController@import');
    Route::post('/user-store','FileController@importUserIntoDB');
    
    //route for the user birthday
    Route::get('/employee-birthday','HomeController@employeeBirth');  
    Route::get('/student-birthday','HomeController@studentBirth');
    
    Route::get('/payments',function(){
        $data['payments'] = App\Payment::all();
        return View('payments.payment')->with(compact('data'));
    });
        


});


Route::get('student-login', 'Auth\StudentLoginController@showLoginForm');

Route::post('student-login', ['as'=>'student-login','uses'=>'Auth\StudentLoginController@login']);

Route::post('student-logout', ['as'=>'student-logout','uses'=>'Auth\StudentLoginController@logout']);

Route::get('student-results', ['as'=>'student-results','uses'=>'StudentDashboardController@results']);

Route::get('student-assignments', ['as'=>'student-assignments','uses'=>'StudentDashboardController@assignments']);

Route::get('student-attendance', ['as'=>'student-attendance','uses'=>'StudentDashboardController@attendance']);

Route::get('student-fees', ['as'=>'student-fees','uses'=>'StudentDashboardController@fees']);

Route::get('student-announcement', ['as'=>'student-announcement','uses'=>'StudentDashboardController@announcement']);

Route::get('student-profile', ['as'=>'student-profile','uses'=>'StudentDashboardController@editProfile']);

Route::post('student-update/{id}', ['as'=>'student-update/{id}','uses'=>'StudentDashboardController@update']);


Route::get('docs', ['as'=>'docs','uses'=>'StudentDashboardController@docs']);

Route::get('docs-download/{path}', ['as'=>'docs-download/{path}','uses'=>'StudentDashboardController@donwloadReason']);

Route::post('download', ['as'=>'download','uses'=>'StudentDashboardController@downloadFiles']);

//file upload

Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));

