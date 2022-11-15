<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function __invoke($city)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForMain($cityInfo['id']);
        $data = $this->dataRepository->getData($cityInfo['id']);

        return view('index.index', compact('posts', 'data'));
    }
}
