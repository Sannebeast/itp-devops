<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of Posts.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new Post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created Post in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        // Create a new Post model object, mass-assign its attributes with
        // the validated data and store it to the database
        $post = Post::create($validated);

        // Redirect to the blog index page
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified Post.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified Post.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified Post in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        // Use `update` to mass (re)assign updated attributes
        $post->update($validated);

        // Redirect to the blog show page
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post successfully updated');
    }

    /**
     * Show the form for deleting the specified Post.
     */
    public function delete(Post $post)
    {
        return view('posts.delete', [
            'post' => $post
        ]);
    }

    /**
     * Remove the specified Post from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the post from the database
        $post->delete();

        // Redirect to the blog show page
        return redirect()->route('posts.index')
            ->with('success', 'Post successfully deleted');
    }

}
