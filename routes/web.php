<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});
//Route::resource('/posts', PostController::class);
Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('posts.index');
    Route::get('/posts/create', 'CreateController')->name('posts.create');
    Route::post('/posts', 'StoreController')->name('posts.store');
    Route::get('/posts/{post}', 'ShowController')->name('posts.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('posts.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('posts.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('posts.destroy');
});
Route::controller(PostController::class)->group(function () {
    Route::get('/posts/restore', 'restore');
    Route::get('posts/first_or_create', 'first_or_create');
    Route::get('/posts/update_or_create', 'update_or_create');
});
Route::resource('/books', BookController::class);
