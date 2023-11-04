<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::post('/newsletters',[NewsletterController::class,'subscribe']);


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments',[CommentController::class,'store'])->middleware('auth');
Route::delete('/posts/{post:slug}/comments/{comment:id}',[CommentController::class,'destroy'])->middleware('auth');

Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('/login',[SessionController::class,'create'])->middleware('guest')->name('login');
Route::post('/sessions',[SessionController::class,'store'])->middleware('guest');


Route::middleware('can:admin')->group(function() {
    Route::resource('admin/posts',AdminPostController::class)->except('show');

    // Route::get('admin/posts',[AdminPostController::class,'index']);
    // Route::get('admin/posts/create',[AdminPostController::class,'create']);
    // Route::post('admin/posts/create',[AdminPostController::class,'store']);
    // Route::get('admin/posts/{post:id}/edit',[AdminPostController::class,'edit']);
    // Route::patch('admin/posts/{post:id}/edit',[AdminPostController::class,'update']);
    // Route::delete('admin/posts/{post:id}/delete',[AdminPostController::class,'destroy']);

    // laravel can assign every 7 route!
});
