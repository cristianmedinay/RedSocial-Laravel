<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct() {
        //protejemos el controlador
        $this->middleware('auth');

    }

    public function index(User $user) {

        //informacion de la sesion
        //dd(auth()->user());
        return view('dashboard',[
            'user' => $user
        ]);
        


        

    }

   
}

