<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        return $this->category->create($request->all());
    }

    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('categories.show', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $category->update($request->all());
        return $category;
    }

    public function destroy(string $slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        return $category->delete();
    }
}
