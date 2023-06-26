<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Post::factory()

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search){    // query builder
            $query->where(function($query){
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            $query->whereHas('category', function($query) use (&$category){
                        $query->where('slug', $category);
                    });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            $query->whereHas('author', function($query) use (&$author){
                        $query->where('username', $author);
                    });
        });
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){     //foreign key is author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
