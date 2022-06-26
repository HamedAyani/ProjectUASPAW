<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials=$request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd('berhasil');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            // if(Auth::user()->level == 'admin'){
            //     return redirect('/admin');
            // }elseif (Auth::user()->level == 'head') {
            //     return redirect('/head');
            // }
            // else{
            //     return redirect('/visitor');
            // }
            return redirect()->intended('/dashboard');
        }
        return back()->with(['loginError'=>'Gagal Login!']);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect()->route('login');
    }
}