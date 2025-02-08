<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request->get('name'));

        //validacion

        $request->request->add(['username' => Str::slug($request->get('username'))]);

        $this->validate($request, [
            'name'=> 'required|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6'
            
        ]);


        User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard.index', auth()->user()->username);
    }





}
