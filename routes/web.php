<?php

use App\Http\Controllers\AdminController;
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
Route::middleware('auth')->group(function(){
    //home
    Route::get('/',[PageController::class,'index'])->name("home");
    //user
    Route::get('/user/createPost',[PageController::class,"createPost"])->name("createPost");//create our post
    Route::post('/user/createPost',[PageController::class,"post"])->name("post");//post our post into home page
    Route::get('/posts/{id}',[PageController::class,"seemorePostById"])->name("seemorePostById");//for Seemore post page
    Route::get('/user/userProfile',[PageController::class,"userProfile"])->name("userProfile");//our profile
    Route::post('/user/userProfile',[PageController::class,"post_userProfile"])->name("post_userProfile");
    Route::get('/user/contactUs',[PageController::class,"contactUs"])->name("contactUs");//contact page
    //admin
    Route::get('/admin/index',[AdminController::class,"index"])->name("admin.home");
    Route::get('/admin/manage_premium_users',[AdminController::class,"manage_premium_users"])->name("admin.manage_premium_users");
    Route::get('/admin/contact_messages',[AdminController::class,"contact_messages"])->name("admin.contact_messages");
    //logout
    Route::get('/logout',[AuthController::class,"logout"])->name("logout");
});




// authentication
Route::middleware('notloginuser')->group(function(){
    Route::get('/login',[AuthController::class,'login'] )->name("login");
    Route::post('/login',[AuthController::class,'post_login'])->name("post_login");
    Route::get('/register',[AuthController::class,'register'])->name("register");
    Route::post('/register',[AuthController::class,"post_register"])->name("post_register");
 
});





