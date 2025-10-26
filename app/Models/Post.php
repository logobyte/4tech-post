<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'user_id',
        'title',
        'content',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        // A post belongs to a user
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        // A post has many comments
        return $this->hasMany(Comment::class);
    }

    // If you're using a custom primary key (uuid), make sure to set it here
    // protected $primaryKey = 'uuid';

    // protected $table = 'posts';  // Uncomment if you have a custom table name
}
