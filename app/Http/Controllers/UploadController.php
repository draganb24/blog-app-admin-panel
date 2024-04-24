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
            $titleImage = ImageIntervention::read($file);
            $titleImage->resize(1024, 768);

            $thumbnail = clone $titleImage;
            $thumbnail->resize(170, 80);

            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $originalPath = 'public/images/tmp/' . $folder . '/' . $filename;
            $thumbnailPath = 'public/images/tmp/' . $folder . '/thumbnail_' . $filename;

            Storage::makeDirectory(dirname($originalPath));
            Storage::makeDirectory(dirname($thumbnailPath));

            $titleImage->save(storage_path('app/' . $originalPath));
            $thumbnail->save(storage_path('app/' . $thumbnailPath));

            $image = new Image();
            $image->image_caption = $filename;
            $image->image_path = str_replace('public/', '', $originalPath);
            $image->thumbnail_path = str_replace('public/', '', $thumbnailPath);
            $image->save();

            return $image->id;
        }

        return '';
    }
}
