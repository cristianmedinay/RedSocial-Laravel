<?php

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

Route::get('/', function () {
    return view('principal');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/tienda', function () {
    return view('tienda');
});
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);


Route::get('/muro',[PostController::class,'index'])->name('muro');
Route::post('/muro',[PostController::class,'store']);
