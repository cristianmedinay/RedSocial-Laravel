<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //


    public function index() {

        //informacion de la sesion
        dd(auth()->user());
        

    }

   
}

