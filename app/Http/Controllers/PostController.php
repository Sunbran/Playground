<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create-post-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'author_name' => 'required|string|max:255',
        ]);

        Post::create($validatedData);

        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
