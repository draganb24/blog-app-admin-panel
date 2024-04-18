<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $image;

    public function __construct()
    {
        $this->image = new Image();
    }

    public function index()
    {
        return $this->image->all();
    }

    public function store(Request $request)
    {
        return $this->image->create($request->all());
    }

    public function show(string $id)
    {
        return $this->image->find($id);
    }

    public function update(Request $request, string $id)
    {
        $image = $this->image->find($id);
        $image->update($request->all());
        return $image;
    }

    public function destroy(string $id)
    {
        $image = $this->image->find($id);
        return $image->delete();
    }
}
