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
        return $this->post->all();
    }

    public function store(Request $request)
    {
        return $this->post->create($request->all());
    }

    public function show(string $slug)
    {
        return $this->post->where('slug', $slug)->first();
    }

    public function update(Request $request, string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        $post->update($request->all());
        return $post;
    }

    public function destroy(string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        return $post->delete();
    }
}
