<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function login_submit(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/Admin');
        }
        return back()->withInput($request->only('email', 'remember'));

    }
    public function logout(){
    Auth::guard('admins')->logout();
    return redirect('Admin/Login');
    }
}
