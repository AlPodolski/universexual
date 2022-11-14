<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repository\DataRepository;

class IndexController extends Controller
{

    public function __invoke()
    {
        $posts = Post::paginate(20);
        $data = $this->dataRepository->getData();
        return view('index.index', compact('posts', 'data'));
    }
}
