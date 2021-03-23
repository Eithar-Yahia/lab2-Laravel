<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//my default page with / will return index view with all posts
Route::get('/', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
//to view crete post page
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
//to save data from create post page
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
//to view edit post using postId as a dynamic parameter
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
//to save editing
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
//to view single post using postId as a dynamic parameter
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
//delete
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



