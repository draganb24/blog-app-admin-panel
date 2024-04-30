<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $folder = uniqid();

            $originalPath = 'public/images/' . $folder . '/' . $filename;
            $thumbnailPath = 'public/images/' . $folder . '/thumbnail_' . $filename;

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
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $processedImage = ImageIntervention::read($image);
                $processedImage->resize(500, 500);

                $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $folder = uniqid();
                $originalPath = 'public/images/gallery/' . $folder . '/' . $filename;
                $thumbnailPath = 'public/images/gallery/' . $folder . '/thumbnail_' . $filename;

                Storage::makeDirectory(dirname($originalPath));
                Storage::makeDirectory(dirname($thumbnailPath));

                $image->storeAs($originalPath);


                // $image = new Image();
                // $image->image_caption = $filename;

                // $lastPostId = Post::latest()->value('id');
                // $post_id = $lastPostId + 1;
                // $image->$post_id;

                // $image->image_path = str_replace('public/', '', $originalPath);
                // $image->save();

                // $images[] = $image->id;
            }


            return '';
        }
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $folder = uniqid();

                $path = 'public/documents/' . $folder . '/' . $filename;
                Storage::makeDirectory(dirname($path));
                $file->storeAs(dirname($path), $filename);

                // $document = new Document();
                // $document->document_title = $filename;
                // $document->document_path = str_replace('public/', '', $path);
                // $document->save();
            }
        }
    }
}

