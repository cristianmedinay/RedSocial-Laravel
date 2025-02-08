<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    //

    public function store(Request $request) {   

        
        // Lógica para manejar la subida de archivos
        /* if ($request->hasFile('file')) {
            $file->store('uploads'); // Guarda el archivo en la carpeta 'uploads'
            return response()->json(['success' => 'File uploaded successfully.']);
        } */


        $file = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $file->extension();


        $imagenServidor = Image::read($file);
        
        $imagenServidor->resize(1000, 1000);
        $imagenServidor->save('uploads/' . $nombreImagen);
        $imagenPath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(['imagen' => $nombreImagen ]);
        

      /*   $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read('images/example.jpg');

        // resize image proportionally to 300px width
        $image->scale(width: 300);

        // insert watermark
        $image->place('images/watermark.png');

        // save modified image in new format 
        $image->toPng()->save('images/foo.png'); */

    }   
}
