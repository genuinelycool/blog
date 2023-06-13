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
        return cache()->rememberForever('posts.all', function () {
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
            })
            // ->sortBy('date');
            ->sortByDesc('date');

            return $posts;
        });
    }

    public static function find($slug){
        return static::all()->firstWhere('slug', $slug);
    }
}