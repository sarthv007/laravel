<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class StudentLoginController extends Controller
{
    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */

 

    use AuthenticatesUsers;

    protected $guard = 'student';

    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/student-dashboard';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.studentLogin');
    }

    public function username(){
        return 'username';
    }
    public function login(Request $request)
    {
        if (auth()->guard('student')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect($this->redirectTo);
        }
        return back()->withErrors(['username' => 'username or password are wrong.']);
    }

    public function logout()
    {
        auth()->guard('student')->logout();
        return redirect('student-login');
    }
}