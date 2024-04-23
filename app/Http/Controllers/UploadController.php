<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('images/tmp/' . $folder, $filename);

            $image = new Image();
            $image->image_caption = $filename;
            $image->image_path = $file;
            $image->save();

            return $image->id;
        }
        return '';
    }
}
