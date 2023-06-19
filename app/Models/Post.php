<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Post::factory()

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {     // Post::newQuery()->filter()
        // $query->where
        // if (request('search')) {
        // if ($filters['search'] ?? false) {  // php 8 : null safe operator // php 7 : Null coalescing operator
        //     $query
        //             ->where('title', 'like', '%' . request('search') . '%')
        //             ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){    // query builder
            $query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%');
        });

        // for php 8: arrow function
        // $query->when($filters['search'] ?? false, fn($query, $search) =>
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%'));
    }

    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){     //foreign key is author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
