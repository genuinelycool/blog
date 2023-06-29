<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString()
            // ->simplePaginate(6)
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() {
        // if (auth()->guest()) {
        //     // abort(403);
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if (auth()->user()->username !== 'dev') {
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if (auth()->user()?->username !== 'dev') {
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        return view('posts.create');
    }
}
