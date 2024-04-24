<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $categories = Category::latest()->with('subcategories')->paginate(10);
        $subcategories = Subcategory::latest()->with('categories')->paginate(10);
        return view('categories.index', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'subcategories.*' => 'exists:subcategories,id',
        ]);

        $slug = Str::slug($validatedData['name']);

        $category = Category::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
        ]);

        if ($request->has('subcategories')) {
            $category->subcategories()->attach($request->input('subcategories'));
        }

        return redirect()->route('categories.index')->with('success', 'Kategorija uspješno kreirana!');
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
        return redirect()->route('categories.index')->with('success', 'Kategorija uspješno obrisana!');
    }
}
