<?php

namespace App\Http\Controllers;

use App\User;
use App\biodata;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function create(Request $request)
    {
        User::create([
            'id' => $request->input('userName'),
            'name' => $request->input('name'),
            'email' => $request->input('userName'),
            'password' =>  md5($request->input('password')),
            'roles' => $request->input('roles')
        ]);
        return redirect()->back();
    }
    public function editUser(Request $request)
    {
        $ed=User::where('id', $request->input('id'))->first();
        $pass=$request->input('password');
        $ed->name = $request->input('name');
        $ed->email = $request->input('userName');
        if ($pass != null) {
            $ed->password =  md5($pass);
        }
        $ed->roles = $request->input('roles');
        $ed->save();
        return redirect()->back();
    }
    public function deleteUser($id)
    {
        $del=User::where('id',$id)->first();
        $del->delete();
        return redirect()->back();
    }
    public function mLink(Request $request)
    {
        $nim=$request->id;
        $ed=biodata::whereIn('nim',$nim)->update(['link' => $request->link]);
        
        return redirect()->back();
    }
}
