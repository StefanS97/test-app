<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'index'])
        ->name('posts.index');
    Route::get('/post/create', [PostController::class, 'create'])
        ->name('posts.create');
    Route::post('/post', [PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])
        ->name('posts.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])
        ->name('posts.delete');
    Route::get('/post/{post}', [PostController::class, 'show'])
        ->middleware('can:view,post')
        ->name('posts.show');
});