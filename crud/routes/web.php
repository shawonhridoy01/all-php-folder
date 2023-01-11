<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    return view('master');
});

// category route
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/create',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/show/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/edit/{id}',[CategoryController::class,'editSubmit'])->name('category.editSubmit');
Route::delete('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');



Route::get('/post',[PostController::class,'index'])->name('index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/create',[PostController::class,'store'])->name('post.store');
Route::get('/post/show/{id}',[PostController::class,'show'])->name('post.show');
Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
// Route::put('/category/edit/{id}',[CategoryController::class,'editSubmit'])->name('category.editSubmit');
// Route::delete('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

