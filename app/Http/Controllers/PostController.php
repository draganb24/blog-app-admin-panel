<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CurrentlyLoggedInUser;
use App\Models\Document;
use App\Models\Image;
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
        $posts = $this->post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'categories.*' => 'exists:categories,id',
            'author' => 'string'
        ]);

        $logged_in_user = CurrentlyLoggedInUser::latest()->first();
        $user = User::find($logged_in_user->user_id);
        $validatedData['author'] = $user->email;

        $slug = strtolower(str_replace(' ', '-', $validatedData['title']));
        $validatedData['slug'] = $slug;

        $post = $this->post->create($validatedData);
        $post->date_of_publishment = request('date_of_publishment') ?? now()->toDateString();

        if ($request->has('image') && !empty($request->input('image'))) {
            $image = Image::where('is_title', true)->latest()->first();
            $post->image_id = $image->id;
            $image->post_id = $post->id;
        }

        if ($request->has('categories') && !empty($request->input('categories'))) {
            $post->categories()->attach($request->input('categories'));
        }

        if ($request->has('images') && !empty($request->input('images'))) {
            $images = Image::whereNull('post_id')->where('is_title', false)->get();

            foreach ($images as $image) {
                $image->post_id = $post->id;
                $image->save();
            }
        }

        if ($request->has('documents') && !empty($request->input('documents'))) {
            $documents = Document::whereNull('post_id')->get();

            foreach ($documents as $document) {
                $document->post_id = $post->id;
                $document->save();
            }
        }

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Objava uspješno kreirana!');
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function edit(Request $request, string $slug)
    {
        $post = Post::with('categories')->where('slug', $slug)->firstOrFail();
        $allCategories = Category::all();
        return view('posts.edit', compact('post', 'allCategories'));
    }

    public function update(Request $request, string $slug)
    {
        $post = Post::with('categories')->where('slug', $slug)->firstOrFail();
        $post->categories()->sync($request->input('categories', []));
        $post->update($request->all());

        $post->date_of_publishment = request('date_of_publishment') ?? now()->toDateString();

        if ($request->has('image') && !empty($request->input('image'))) {
            $image = Image::where('is_title', true)->latest()->first();
            $post->image_id = $image->id;
            $image->post_id = $post->id;
        }

        if ($request->has('images') && !empty($request->input('images'))) {
            $images = Image::whereNull('post_id')->where('is_title', false)->get();

            foreach ($images as $image) {
                $image->post_id = $post->id;
                $image->save();
            }
        }

        if ($request->has('documents') && !empty($request->input('documents'))) {
            $documents = Document::whereNull('post_id')->get();

            foreach ($documents as $document) {
                $document->post_id = $post->id;
                $document->save();
            }
        }

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Objava uspješno izmijenjena!');
    }

    public function destroy(string $slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Objava uspješno obrisana!');
    }
}
