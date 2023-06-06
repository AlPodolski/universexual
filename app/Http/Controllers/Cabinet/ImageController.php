<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = $request->post('id');

        $file = Photo::where(['id' => $id])->with('post')->first();

        if ($file->post->user_id != auth()->id()) abort(403);

        $path = (storage_path('app/public/' . $file->file));

        if (file_exists($path)) {

            unlink($path);

        }

        $file->delete();

    }
}
