<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function admin_login(){
        return view('auth.login');    
    }
    public function adminLoginPost(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // exit("hello");
            
            // exit("login");
            // if(Auth::user()->status == 1){
                return redirect("admin-dashboard");
            // }
            // return redirect()->back()->with('error','Your account is inactive.');
        }
        return redirect()->back()->with('error','Your login details is invalid.');
        
    }

}
