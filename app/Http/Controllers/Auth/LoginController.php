<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function loginCoba(Request $request){
        $user = User::with('biodata')->where([ 
            'email'  => $request->email,
            'password'  => md5($request->password)
        ])->first(); 
        if($user == null){
            return redirect()->back()->withErrors(['msg' => 'Username dan Password anda']);
        }
        Auth::login($user);
        return $this->redirectTo();

    }
    public function redirectTo(){
        if(auth()->user()->roles=='admin' || auth()->user()->roles=='prodi'|| auth()->user()->roles=='jurusan' || auth()->user()->roles=='superAdmin'){
            return redirect('/home/'.auth()->user()->id);
        }elseif(auth()->user()->roles=='alumni'){
            return redirect('/alumniDash/'.auth()->user()->id);
        }
           
        }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
