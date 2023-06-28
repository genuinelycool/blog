<?php

use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

// Route::post('newsletter', function () {
// Route::post('newsletter', function (Newsletter $newsletter) {
//     request()->validate(['email' => 'required|email']);

//     try {
//         // $newsletter = new Newsletter();
//         // $newsletter->subscribe(request('email'));

//         // (new Newsletter())->subscribe(request('email'));    // inline
//         $newsletter->subscribe(request('email'));    // inline

//     } catch (\Exception $e) {
//         throw ValidationException::withMessages([
//             'email' => 'This email could not be added to our newsletter list.'
//         ]);
//     }

//     return redirect('/')
//         ->with('success', 'You are now signed up for our newsletter!');
// });

// Route::post('newsletter', NewsletterController::class);     // single action contoller
