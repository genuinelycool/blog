<?php

use App\Models\Post;
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
    // $files =  File::files(resource_path("posts"));

    // $posts = [];

    // foreach($files as $file){
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );

    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);

    // $posts = collect($files)
    //     ->map(function($file){
    //         $document = YamlFrontMatter::parseFile($file);

    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    //     });

    // $posts = collect($files)
    //     ->map(function($file){          //arrow fxn:  ->map(fn($file) => YammlFrontMatter::parseFile($file))
    //         return YamlFrontMatter::parseFile($file);
    //     })
    //     ->map(function($document){      // ->map(fn($document) => new Post(
    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    //     });

    // ddd($posts[0]);
    // return view('posts', ['posts'=>$post]);

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );

    // ddd($document->date);



    $posts = Post::all();
    // $posts = $posts;

    // // ddd($posts);

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('/posts/{post}', function ($slug) {
    // Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');
