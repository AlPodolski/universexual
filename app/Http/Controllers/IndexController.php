<?php

namespace App\Http\Controllers;

use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($city, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForMain($cityInfo['id']);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaRepository->getForMain('/', $cityInfo, $request);

        return view('index.index', compact('posts', 'data', 'meta'));
    }
}
