<?php

namespace App\Http\Controllers\Auth;

use App\Mail\activation_mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);

        if ($validator->passes()){
            $user = $this->create($data)->toArray();
            $user['token'] = str_random(30);

            DB::table('user_activations')->insert(['user_id'=>$user['id'],'token'=>$user['token']]);

            Mail::to($user['email'])->send(new activation_mail($user['name'],$user['token']));

            return redirect()->to('login')->with('success',"We sent activation code. Please check your mail.");
        }
        return back()->with('errors',$validator->errors());
    }

    public function userActivation($token){
        $check = DB::table('user_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if ($user->active == 1){
                return redirect()->to('login')->with('success',"User are already actived.");

            }
            $user->active=1;
            $user->save();
            DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('login')->with('success',"User active successfully.");
        }
        return redirect()->to('login')->with('warning',"Your token is invalid");
    }
}
