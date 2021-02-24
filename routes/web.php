<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

//home
Route::get('/',[PageController::class,'index'])->name("home");
//user
Route::get('/user/createPost',[PageController::class,"createPost"])->name("createPost");//create our post
Route::post('/user/createPost',[PageController::class,"post"])->name("post");//post our post into home page
Route::get('/user/userProfile',[PageController::class,"userProfile"])->name("userProfile");//our profile
Route::get('user/contactUs',[PageController::class,"contactUs"])->name("contactUs");//contact page
// authentication
Route::get('/login',[AuthController::class,'login'] )->name("login");
Route::get('/register',[AuthController::class,'register'])->name("register");



