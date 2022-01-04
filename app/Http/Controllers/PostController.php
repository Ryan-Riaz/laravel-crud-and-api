<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    // Get all the posts
    public function index()
    {
        return Post::all();
    }

    // Create a post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        return Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    }

    // Get a post
    public function show(Post $post)
    {
        // $post = Post::find($post);
        return $post;
    }

    // Get a post by title
    public function searchByTitle($title)
    {
        return Post::where('title', 'like', '%' . $title . '%')->get();
    }

    // Update a post
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return $post;
    }

    // Delete a post
    public function destroy(Post $post)
    {
        // $post = Post::findOrFail($post);
        $post->delete();
        return $post;
    }
}
