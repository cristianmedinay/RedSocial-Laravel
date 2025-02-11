<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request , User $user) {

        $request->request->add(['username' => Str::slug($request->get('username'))]);

        $this->validate($request,[
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil'],
            
            

        ]);

        if($request->imagen) {
            //cambiamos el file a imagen antes era file
            $file = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $file->extension();


            $imagenServidor = Image::read($file);
            
            $imagenServidor->resize(1000, 1000);
            $imagenServidor->save('uploads/' . $nombreImagen);
            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
            $imagenServidor->save($imagenPath);
            
            
        } 

        //Guardar cambios de usuario
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? null;
        $usuario->save();

        //redirecciona
        return redirect()->route('dashboard.index', $usuario->username);
    }



}
