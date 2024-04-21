<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
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
        $categories = Category::with('subcategories')->get();
        $subcategories = Subcategory::with('categories')->get();
        return view('categories.index', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        return $this->category->create($request->all());
    }

    public function show(string $slug)
    {
        $category = Category::with('subcategories')->where('slug', $slug)->firstOrFail();
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, string $slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $category->update($request->all());
        $category->subcategories()->sync($request->input('subcategories', []));
        $allSubcategories = Subcategory::all();
        return view('categories.edit', compact('category', 'allSubcategories'));
    }


    public function destroy(string $slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Post successfully deleted');
    }
}
