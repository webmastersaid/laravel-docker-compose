<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin\Post'], function () {
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/post', IndexController::class)->name('admin.post.index');
        Route::get('/book', IndexController::class)->name('admin.book.index');
    });
});
Route::controller(PostController::class)->group(function () {
    Route::get('/posts/restore', 'restore');
    Route::get('posts/first_or_create', 'first_or_create');
    Route::get('/posts/update_or_create', 'update_or_create');
});
// Route::resource('/books', BookController::class);
Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('book.index');
    Route::get('/books/create', 'create')->name('book.create');
    Route::post('/books', 'store')->name('book.store');
    Route::get('/books/{book}', 'show')->name('book.show');
    Route::get('/books/{book}/edit', 'edit')->name('book.edit');
    Route::patch('/books/{book}', 'update')->name('book.update');
    Route::delete('/books/{book}', 'destroy')->name('book.destroy');
});

Auth::routes();
Route::redirect('/admin', '/home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
