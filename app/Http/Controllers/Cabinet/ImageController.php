<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = $request->post('id');

        if ($type = $request->post('type') and $type == 'video') {

            $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();

            $path = (storage_path('app/public/' . $post->video));

            if (file_exists($path)) {

                unlink($path);

            }

            $post->video = '';

            $post->save();

        } else {

            $file = Photo::where(['id' => $id])->with('post')->first();

            if ($file->post->user_id != auth()->id()) abort(403);

            $path = (storage_path('app/public/' . $file->file));

            if (file_exists($path)) {

                unlink($path);

            }

            $file->delete();

        }

    }

    public function add(Request $request)
    {

        $request->validate([
            'id' => 'required|integer',
            'file' => 'required|file',
        ]);

        // Найти соответствующий пост
        $post = Post::find($request->id);

        // Если пост не найден
        if (!$post) {
            return response()->json([
                'error' => 'Post not found'
            ], 404);
        }

        $dir = \substr(\md5($post->url), 0, 3);

        $avatar = $request->file('file');

        // Удалить старый аватар, если он есть
        if ($avatar) {

            \Cache::delete('post_' . $post->url);

            $avatar = $avatar->store('/uploads/' . $dir, 'public');

            $path = (storage_path('app/public/' . $post->avatar));

            if (file_exists($path)) {

                unlink($path);

            }

            $post->avatar = $avatar;

            $post->save();

        }

        return '/storage/'.$post->avatar;
    }

}
