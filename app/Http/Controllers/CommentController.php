<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\Notification\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Validate the comment
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Store the comment
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;
        $comment->save();

        // Send notification
        $post->user->notify(new CommentNotification($comment));

        // Redirect back to the post page
        return back()->with('success', 'Your comment has been posted!');
    }
}
