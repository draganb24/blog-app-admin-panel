<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

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
        return $this->subcategory->create($request->all());
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
        return $subcategory;
    }

    public function destroy(string $slug)
    {
        $subcategory = $this->subcategory->where('slug', $slug)->firstOrFail();
        return $subcategory->delete();
    }
}
