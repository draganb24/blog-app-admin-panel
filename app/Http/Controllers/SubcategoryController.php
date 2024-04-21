<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    protected $subcategory;

    public function __construct()
    {
        $this->subcategory = new Subcategory();
    }

    public function index()
    {
        $subcategories = Subcategory::all();
        return $subcategories;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:subcategories',
            'categories.*' => 'exists:categories,id',
        ]);

        $slug = Str::slug($validatedData['name']);

        $subcategory = Subcategory::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
        ]);

        if ($request->has('categories')) {
            $subcategory->categories()->attach($request->input('categories'));
        }

        return redirect()->route('categories.index')->with('success', 'Category successfully created');
    }

    public function show(string $slug)
    {
        $subcategory = Subcategory::with('categories')->where('slug', $slug)->firstOrFail();
        return response()->json(['subcategory' => $subcategory]);
    }

    public function update(Request $request, string $slug)
    {
        $subcategory = $this->subcategory->where('slug', $slug)->firstOrFail();
        $subcategory->update($request->all());
        $subcategory->categories()->sync($request->input('categories', []));
        $allCategories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'allCategories'));
    }

    public function destroy(string $slug)
    {
        $subcategory = $this->subcategory->where('slug', $slug)->firstOrFail();
        $subcategory->delete();
        return redirect()->route('categories.index')->with('success', 'Post successfully deleted');
    }
}
