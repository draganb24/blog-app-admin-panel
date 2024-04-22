<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);

        $validatedData['author'] = Auth::user()->name;

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
        $post->categories()->sync($request->input('categories', []));
        $allCategories = Category::all();
        return view('posts.edit', compact('post', 'allCategories'));
    }

    public function destroy(string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post successfully deleted');
    }

    public function getByTitle(string $title)
    {
        $post = Post::where('title', $title)->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
