<?php

namespace App\Http\Controllers;

class FilterController extends Controller
{
    public function __invoke($city, $search)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForFilter($cityInfo['id'], $search);
        $data = $this->dataRepository->getData($cityInfo['id']);

        return view('index.index', compact('posts', 'data'));
    }
}
