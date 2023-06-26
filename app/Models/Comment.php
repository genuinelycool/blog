<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // protected $guarded = [];

    public function post(){     // column name is post_id
        return $this->belongsTo(Post::class);
    }

    public function author(){   // foreign is author_id but its not so needs to override
        return $this->belongsTo(User::class, 'user_id');
    }
}
