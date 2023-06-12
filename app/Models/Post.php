<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        // $files =  File::files(resource_path("posts/"));

        // return array_map(function ($file){
        //     return $file->getContents();
        // }, $files);

        // return array_map(fn($file) => $file->getContents(), $files);  // using array function

        $files =  File::files(resource_path("posts"));
        $posts = collect($files)
        ->map(function($file){          //arrow fxn:  ->map(fn($file) => YammlFrontMatter::parseFile($file))
            return YamlFrontMatter::parseFile($file);
        })
        ->map(function($document){      // ->map(fn($document) => new Post(
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        });

        return $posts;
    }

    public static function find($slug){
        // if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException();
        // }

        // $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
        //     return file_get_contents($path);
        // });

        // return $post;

        // of all the blog posts, find the one with a slug that matches the one that was requested.
        // $posts = static::all();

        // return $posts->firstWhere('slug', $slug);

        return static::all()->firstWhere('slug', $slug);
    }
}
