<?php

use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);     // single action contoller

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section
Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');

// Route::get('admin/posts', [AdminPostController::class, 'index']);
// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');

// Route::middleware('can:admin')->group(function(){
//     Route::get('admin/posts', [AdminPostController::class, 'index']);
//     Route::post('admin/posts', [AdminPostController::class, 'store']);
//     Route::get('admin/posts/create', [AdminPostController::class, 'create']);
//     Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//     Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
//     Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
// });

// Route::middleware('can:admin')->group(function(){
//     // Route::resource('admin/posts', AdminPostController::class);
//     Route::resource('admin/posts', AdminPostController::class)->except('show');


//     // Route::get('admin/posts', [AdminPostController::class, 'index']);
//     // Route::post('admin/posts', [AdminPostController::class, 'store']);
//     // Route::get('admin/posts/create', [AdminPostController::class, 'create']);
//     // Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//     // Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
//     // Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
// });



