<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function __invoke($city,$id)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $post = $this->postRepository->getSingle($id);
        $data = $this->dataRepository->getData($cityInfo['id']);

        return view('post.index', compact('post', 'data'));
    }
}
