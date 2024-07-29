<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $title = "Login";
        return view('auth.login',compact('title'));
    }
    public function login_action(Request $request)
    {
       
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
           
            $request->session();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login success!');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);

    }

    public function logout(Request $request)
    {
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
