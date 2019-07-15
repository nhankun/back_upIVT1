<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'user_type'=>User::USER_ADMIN,'active'=>1])){
            return redirect()->intended(route('admin.index'));
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'user_type'=>User::USER_CUSTOMER,'active'=>1])){
            return redirect()->intended(route('home'));
        }elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'user_type'=>User::USER_CUSTOMER,'active'=>0])){
            Auth::logout();
            return redirect()->route('login')->with('error',"Please activated your account !");
        } else{
            return redirect()->route('login')->with('error', 'Your email or password is incorrect!');
        }
    }
}
