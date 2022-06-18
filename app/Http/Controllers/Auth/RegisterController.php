<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\biodata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function create(Request $request)
    {
            User::create([
            'id' => preg_replace('/[^a-zA-Z0-9_-]/s ', '', $request->input('userName')),
            'name' => $request->input('name'),
            'email' => $request->input('userName'),
            'password' =>  md5($request->input('password')),
            'roles' => $request->input('roles')
        ]);
        return redirect()->back();
        
        
    }
    protected function buatUser(Request $request)
    {
        $nim=$request->input('nim');
        $chk=biodata::where('nim',$nim)->first();
        if ($chk == null) {
            User::create([
            'id' => $request->input('nim'),
            'name' => $request->input('nim'),
            'email' => $request->input('email'),
            'password' =>  md5($request->input('password')),
            'roles' => 'alumni'
        ]);
        return redirect('/login');
        }
        return redirect()->back()->withErrors(['msg' => 'NIM anda sudah terdaftar']);
    }
}
