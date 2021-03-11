<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\ContactMessage;
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
    //page
    Route::get('/',[PageController::class,'index'])->name("home");
    Route::get('/user/createPost',[PageController::class,"createPost"])->name("createPost");//call createpost page
    Route::get('/posts/{id}',[PageController::class,"seemorePostById"])->name("seemorePostById");//for Seemore post page(show post by id)
    Route::get('/posts/edit/{id}',[PageController::class,"editPost"])->name("editPost");//edit post page by id
    Route::get('/user/userProfile',[PageController::class,"userProfile"])->name("userProfile");//our profile
    Route::get('/user/contactUs',[PageController::class,"contactUs"])->name("contactUs");//contact page
   
    //posts
    Route::post('/user/createPost',[PostController::class,"post"])->name("post");//post our post into home page 
    Route::get('/posts/delete/{id}',[PostController::class,"deletePost"])->name("deletePost");//delete post by id
    Route::post('/posts/update/{id}',[PostController::class,"updatePost"])->name("updatePost");//update post by id

    //contact
    Route::post('/user/contactUs',[ContactUsController::class,"post_contact_message"])->name('post_contact_message');//post user feedback to admin
    Route::get('/admin/contact_messages/delete/{id}',[ContactUsController::class,"deleteMessage"])->name('deleteMessage');//admin is delete contactsms by id
    Route::get('/admin/contact_messages/edit/{id}',[ContactUsController::class,"editMessage"])->name('editMessage');//call edit message form by id
    Route::post('/admin/contact_messages/update/{id}',[ContactUsController::class,"updateMessage"])->name('updateMessage');//admin is update contactsms by id

    Route::post('/user/userProfile',[AuthController::class,"post_userProfile"])->name("post_userProfile");
    
    //admin&manage_premium_users
    Route::get('/admin/index',[AdminController::class,"index"])->name("admin.home");//call admin home page
    Route::get('/admin/manage_premium_users',[AdminController::class,"manage_premium_users"])->name("admin.manage_premium_users");//call manage_premium_users page
    Route::get('/admin/manage_premium_users/delete/{id}',[AdminController::class,"deleteUser"])->name("deleteUser");//admin is delete user by id
    Route::get('/admin/manage_premium_users/edit/{id}',[AdminController::class,"editUser"])->name("editUser");//admin is call editUser blade
    Route::post('/admin/manage_premium_users/update/{id}',[AdminController::class,"updateUser"])->name('updateUser');//admin is update userdata by id

    Route::get('/admin/contact_messages',[AdminController::class,"contact_messages"])->name("admin.contact_messages");//call contactmessages blade
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





