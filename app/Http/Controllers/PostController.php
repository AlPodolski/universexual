<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where('posts.id', $id)
            ->join('nationals', 'national_id', '=', 'nationals.id')
            ->first();

        $data = $this->dataRepository->getData();

        return view('post.index', compact('post', 'data'));
    }
}
