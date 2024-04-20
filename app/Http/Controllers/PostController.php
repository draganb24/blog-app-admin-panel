<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);

        $slug = strtolower(str_replace(' ', '-', $validatedData['title']));
        $validatedData['slug'] = $slug;
        $post = $this->post->create($validatedData);
        return $post;
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        $post->update($request->all());
        return view('posts.edit', compact('post'));
    }

    public function destroy(string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        return $post->delete();
    }
}
