<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Comment Posted')
            ->view('emails.commentPosted'); // Create this view in the next step
    }
}
