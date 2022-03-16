<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); //menghindari sesssion fixation

            switch(Auth::user()->role){
                case 'super':
                    return redirect()->intended('/admin/dashboard');
                    break;
                case 'admin':
                    return redirect()->intended('/admin/type');
                    break;
                case 'user':
                    return redirect()->intended('/search');
                    break;
                default:
                    return redirect()->intended('/');
            }
        }else{
            return back()->with('loginError', 'Something Wrong');
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
