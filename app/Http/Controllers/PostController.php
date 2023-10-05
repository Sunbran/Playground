<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.form');
    }

    public function show(Post $post)
    {
        dd($post);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'author_name' => 'required|string|max:255',
        ]);

        $post = Post::create($validatedData);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully!');
    }
}
