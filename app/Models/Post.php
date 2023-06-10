<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function all(){
        $files =  File::files(resource_path("posts/"));

        return array_map(function ($file){
            return $file->getContents();
        }, $files);

        // return array_map(fn($file) => $file->getContents(), $files);  // using array function
    }

    public static function find($slug){
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
            return file_get_contents($path);
        });

        return $post;
    }
}
