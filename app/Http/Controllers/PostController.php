<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoreRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Post::paginate(3); // simplePaginate();

        return view('posts.index', [
            'posts' => $records
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedForm = $request->validated();

        // Set the UUID for the post
        Arr::set($validatedForm, 'uuid', Str::uuid());

        Post::create($validatedForm);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Eager load comments and the user associated with each comment
        $post->load('comments.user');  // Eager load comments and their users

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Pass the post to the view for editing
        return view('posts.edit', compact('post'));
    }

    /**
     * Handle the update request and update the post.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the post in the database
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect back to the post's page with a success message
        return redirect()->route('posts.show', $post->uuid)
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Soft delete the post if necessary
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }

    /**
     * Store a newly created comment for the specified post.
     */
    public function storeComment(Request $request, Post $post)
    {
        // Validate the comment data
        $request->validate([
            'comment' => 'required|string|max:1000', // You can adjust validation rules as needed
        ]);

        // Create a new comment for the post
        $post->comments()->create([
            'user_id' => auth()->id(), // Assuming the user is logged in
            'comment' => $request->comment, // The actual comment content
        ]);

        // Redirect back to the post's page with a success message
        return redirect()->route('posts.show', $post->uuid)
            ->with('success', 'Comment added successfully!');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroyComment(Post $post, Comment $comment)
    {
        // Ensure that the user is authorized to delete the comment
        if (auth()->id() !== $comment->user_id && !auth()->user()->is_admin) {
            return redirect()->route('posts.show', $post->uuid)
                ->with('error', 'You are not authorized to delete this comment.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->route('posts.show', $post->uuid)
            ->with('success', 'Comment deleted successfully!');
    }
}
