<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('/posts');
    //return view('page');
});
//Akcje dotyczące postów
Route::get('/posts',[PostsController::class,'index']);
Route::get('/posts/create',[PostsController::class,'create'])->middleware('auth');
Route::get('/posts/{post}',[PostsController::class,'show']);
Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->middleware('auth');
Route::post('/posts/{post}/edit',[PostsController::class,'update'])->middleware('auth');
Route::post('/posts/create',[PostsController::class,'store'])->middleware('auth');
Route::delete('/posts/{post}/delete',[PostsController::class,'delete'])->middleware('auth');

//Akcje dotyczące konta
Route::get('/user/register',[AccountController::class,'register'])->middleware('guest');
Route::post('/user/register',[AccountController::class,'putToDatabase']);
Route::get('/user/login',[AccountController::class,'login'])->name('login')->middleware('guest');
Route::post('/user/login',[AccountController::class,'authenticate']);
Route::post('/user/logout',[AccountController::class,'logout']);
Route::get('/user/manage',[AccountController::class,'manage'])->middleware('auth');
Route::get('/user/{user}/graduate',[AccountController::class,'graduate'])->middleware('auth');
Route::get('/user/{user}/degrade',[AccountController::class,'degrade'])->middleware('auth');
Route::delete('/user/{user}/delete',[AccountController::class,'delete'])->middleware('auth');
//Route::post('/user/manage',[AccountController::class,'update']);


