<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Define the fields that can be mass-assigned
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    // Define relationships with other models (e.g., Post, User)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
