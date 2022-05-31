<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
    Route::get('/', [PostController::class, 'showPosts'])->name('list');
    Route::get('/create', [PostController::class, 'createPost'])->name('create');
    Route::post('store', [PostController::class, 'savePost'])->name('save');
    Route::get('/{item}/show', [PostController::class, 'getPost'])->name('edit');
    Route::put('/{item}/edit', [PostController::class, 'savePost'])->name('update');
    Route::delete('/{item}/destroy', [PostController::class, 'deletePost'])->name('delete');
});

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('/{item}/show', [StudentController::class, 'show'])->name('show');
    Route::get('/{item}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{item}/update', [StudentController::class, 'update'])->name('update');
    Route::delete('/{item}/destroy', [StudentController::class, 'destroy'])->name('destroy');
});
