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
Route::resource('/posts', PostController::class);
Route::controller(PostController::class)->group(function () {
    Route::get('/posts/restore', 'restore');
    Route::get('posts/first_or_create', 'first_or_create');
    Route::get('/posts/update_or_create', 'update_or_create');
});
Route::resource('/books', BookController::class);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/downloads', [DownloadController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
