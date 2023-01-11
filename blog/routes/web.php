<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\frontend\FrontEndController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontEndController::class,'index'])->name('frontend.index');
Route::get('/tutorial/{category_slug}',[FrontEndController::class,'viewCategory'])->name('frontend.viewCategory');

Route::get('/tutorial/{category_slug}/{post_slug}',[FrontEndController::class,'viewPost'])->name('frontend.viewPost');

// comment system
Route::post('/store',[CommentController::class,'store'])->name('comment.store');


Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/create',[CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/edit/{id}',[CategoryController::class,'editSubmit'])->name('category.editSubmit');
    Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


    // posts route
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::get('/add-post',[PostController::class,'create'])->name('post.create');
    Route::post('/add-post',[PostController::class,'store'])->name('post.store');
    Route::get('/post-edit/{id}',[PostController::class,'edit'])->name('post.edit');

    Route::put('/post-edit/{id}',[PostController::class,'editSubmit'])->name('post.editSubmit');

    // user route
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/{user_id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/user/{user_id}',[UserController::class,'editSubmit'])->name('user.editSubmit');

});
