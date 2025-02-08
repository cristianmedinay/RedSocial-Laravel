<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index() {
        return view('auth.login');
    }


    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email','password'), $request->remember) ) {
            return redirect()->route('dashboard.index', auth()->user()->username);
        }

        return back()->with('mensaje', 'Credenciales incorrectas');
    }
}   
