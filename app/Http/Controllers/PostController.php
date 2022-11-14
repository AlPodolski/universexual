<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::findOrFail($id);

        return view('post.index', compact('post'));
    }
}
