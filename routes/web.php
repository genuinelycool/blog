<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
})->name('home');

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
