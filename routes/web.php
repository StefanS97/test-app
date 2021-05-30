<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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
    Route::post('/post', [PostController::class, 'store'])
        ->name('posts.store');    
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])
        ->middleware('can:update,post')
        ->name('posts.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])
        ->middleware('can:delete,post')
        ->name('posts.delete');
    Route::get('/post/{post}', [PostController::class, 'show'])
        ->name('posts.show');
    Route::post('/post/search', [PostController::class, 'search'])
        ->name('posts.search');

    Route::post('/post/{post}/comment', [CommentController::class, 'store'])
        ->name('comment.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])
        ->middleware('can:delete,comment')
        ->name('comment.delete');

    Route::get('/tag', [TagController::class, 'index'])
        ->middleware('can:view,App\Models\Tag')
        ->name('tag.index');
    Route::get('/tag/create', [TagController::class, 'create']);
    Route::post('/tag', [TagController::class, 'store'])
        ->middleware('can:view,App\Models\Tag')
        ->name('tag.store');
    Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])
        ->middleware('can:view,tag')
        ->name('tag.edit');
    Route::delete('/tag/{tag}', [TagController::class, 'destroy'])
        ->middleware('can:view,tag')
        ->name('tag.delete');
    Route::put('/tag/{tag}', [TagController::class, 'update'])
        ->middleware('can:view,tag')
        ->name('tag.update');
});