<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image as ImageIntervention;


class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileImage = ImageIntervention::read($file);
            $fileImage->resize(400, 400);

            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $path = 'public/images/tmp/' . $folder . '/' . $filename;

            Storage::makeDirectory(dirname($path));

            $fileImage->save(storage_path('app/' . $path));

            $fileImage->save(storage_path('app/' . $path));

            $image = new Image();
            $image->image_caption = $filename;
            $image->image_path = str_replace('public/', '', $path);
            $image->save();

            return $image->id;
        }

        return '';
    }
}
