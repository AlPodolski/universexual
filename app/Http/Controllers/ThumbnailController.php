<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ThumbnailController extends Controller
{
    public function make($size, $path)
    {
        [$width, $height] = explode('-', $size);

        $originalPath = "public/" . $path;
        $thumbPath = "public/thumbnails/{$size}/" . $path;

        if (!Storage::exists($originalPath)) {
            abort(404, 'Original image not found');
        }

        if (!Storage::exists($thumbPath)) {
            $image = Image::make(Storage::path($originalPath))
                ->fit((int) $width, (int) $height);

            Storage::put($thumbPath, (string) $image->encode('jpg', 80));
        }

        return response()->file(Storage::path($thumbPath));
    }

}
