<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CurrentlyLoggedInUser;
use App\Models\Post;
use App\Models\User;
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
        $posts = $this->post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'categories.*' => 'exists:categories,id',
    ]);

    $logged_in_user = CurrentlyLoggedInUser::latest()->first();
    $user = User::find($logged_in_user->user_id);
    $validatedData['author'] = $user->email;
    $slug = strtolower(str_replace(' ', '-', $validatedData['title']));
    $validatedData['slug'] = $slug;

    $post = $this->post->create($validatedData);

    if ($request->has('categories')) {
        $post->categories()->attach($request->input('categories'));
    }

    return redirect()->route('posts.index')->with('success', 'Post successfully created');
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
        $logged_in_user = CurrentlyLoggedInUser::latest()->first();
        $post->user_id = $logged_in_user->user_id;
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
