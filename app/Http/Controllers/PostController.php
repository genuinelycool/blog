<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // dd(request('search'));
        // dd(request(['search']));
        // dd(request()->only('search'));

        return view('posts', [
            // 'posts' => $this->getPosts(),
            // 'posts' => Post::latest()->filter()->get(),
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }

    // public function getPosts() {
        // return Post::latest()->filter()->get();    // query scopes


        // $posts = Post::latest();

        // if (request('search')) {
        //     $posts
        //             ->where('title', 'like', '%' . request('search') . '%')
        //             ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        // return $posts->get();
    // }
}
