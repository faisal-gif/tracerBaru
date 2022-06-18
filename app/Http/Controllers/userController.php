<?php

namespace App\Http\Controllers;

use App\User;
use App\biodata;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function create(Request $request)
    {
        $chk=$request->input('userName');
        if ($chk != null) {
            User::create([
                'id' => preg_replace('/[^a-zA-Z0-9_-]/s ', '', $chk),
                'name' => $request->input('name'),
                'email' => $chk,
                'password' =>  md5($request->input('password')),
                'roles' => $request->input('roles')
            ]);
            return redirect()->back()->with('success', 'Data telah tersimpan');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Username Anda Kosong']);
        }
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
        return redirect()->back()->with('success', 'Data telah teredit');
    }
    public function deleteUser($id)
    {
        $del=User::where('id', $id)->first();
        $del->delete();
        return redirect()->back();
    }
    public function mLink(Request $request)
    {
        $nim=$request->id;
        $ed=biodata::whereIn('nim', $nim)->update(['link' => $request->link]);
        
        return redirect()->back();
    }
    public function editAcc(Request $request)
    {
        $ed=User::where('id', $request->input('id'))->first();
        $pass=md5($request->input('newPassword'));
        $passOl=md5($request->input('oldPassword'));
        $chck=$ed->password;
        
        $ed->email = $request->input('userName');
       
        if ($pass != null) {
            if ($passOl == $chck) {
                $ed->password =  md5($pass);
            } else {
                return redirect()->back()->withErrors(['msg' => 'Password Lama Anda Salah']);
            }
        }
        $ed->save();
        return redirect()->back()->with('success', 'Data telah tersimpan');
    }
}
