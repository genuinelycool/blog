<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Post::factory()

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    // public function user(){     //foreign key is user_id
    //     return $this->belongsTo(User::class);
    // }

    public function author(){     //foreign key is author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
