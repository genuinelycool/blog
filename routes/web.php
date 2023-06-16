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
    // \Illuminate\Support\Facades\DB::listen(function($query){
    //     // \Illuminate\Support\Facades\Log::info('foo');
    //     logger($query->sql, $query->bindings);
    // });

    return view('posts', [
        // 'posts' => Post::all()
        // 'posts' => Post::latest()->with('category', 'author')->get()    //eager load or include
        'posts' => Post::latest()->with(['category', 'author'])->get()      // or we can use it as array also
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {    // Post::where('slug', $post)->firstOrFail();
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function(User $author){
    // dd ($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});
