<?php

namespace App\Http\Controllers\Admin;

use App\Admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function  register(){
        return view('admin.register');
    }
    public function register_submit(Request $request){
        $this->validate($request,[
           'email'=>'required',
           'password'=>'required'
        ]);


        Admins::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/Admin/Login');
    }
}
