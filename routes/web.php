<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\Student1Controller;
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

Route::controller(StudentController::class)
    ->prefix('student')
    ->as('student.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{item}/show', 'show')->name('show');
        Route::get('/{item}/edit', 'edit')->name('edit');
        Route::put('/{item}/update', 'update')->name('update');
        Route::delete('/{item}/destroy', 'destroy')->name('destroy');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('secureUser')->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::controller(SendEmailController::class)
    ->prefix('email')
    ->as('email.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/sendEmail', 'sendEmail')->name('sendEmail');
        Route::get('/{id}/approved', 'approved')->name('approved');
});
