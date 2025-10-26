<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoreRequest;
use App\Models\Post;
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
        // With route model binding, Laravel will automatically fetch the post using the uuid
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
        // You can add functionality to delete the post if necessary
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
