<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
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
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/cars', [CarController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/downloads', [DownloadController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/restore', [PostController::class, 'restore']);
Route::get('posts/first_or_create', [PostController::class, 'first_or_create']);
Route::get('/posts/update_or_create', [PostController::class, 'update_or_create']);