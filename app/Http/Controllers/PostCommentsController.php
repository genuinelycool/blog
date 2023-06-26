<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post){
        // dd(request()->user()->id);

    // public function store(Post $post, Request $request){
        // add a comment to the given post
        // dd($post);
        // dd(request()->all());

        //validation
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            // 'user_id' => auth()->id,
            // 'user_id' => auth()->user()->id,
            'user_id' => request()->user()->id,
            // 'user_id' => $request->user()->id(),
            'body' => request('body')
            // 'body' => $request->input('body')
        ]);

        return back();
    }
}
