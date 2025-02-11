<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//cloudshure ruta simple
Route::get('/', function () {
    return view('principal');
});


//una ruta que tiene un controlador y solo un metodo le pasas solo el controlador
Route::get('/home',HomeController::class)->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/tienda', function () {
    return view('tienda');
});
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);


/* Route::get('/muro',[PostController::class,'index'])->name('dashboard'); */


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('{user:username}/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('{user:username}/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');

Route::get('/{user:username}',[PostController::class,'index'])->name('dashboard.index');
Route::get('/posts/create',[PostController::class,'create'])->name('dashboard.create');
Route::post('/posts',[PostController::class,'store'])->name('dashboard.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('dashboard.show');// posts funciona porque en el controlador lleva el nombre de la vista posts pero en router vistas lleva dashboard porque el nombre aqui lo asignamos dashboard


Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('dashboard.destroy');


//



Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('dashboard.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('dashboard.likes.destroy');


Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('user.unfollow');



