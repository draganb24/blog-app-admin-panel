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
            $path = $file->storeAs('public/images/tmp/' . $folder, $filename);

            $image = new Image();
            $image->image_caption = $filename;
            $image->image_path = str_replace('public/', '', $path);
            $image->save();
            return $image->id;
        }
        return '';
    }
}
