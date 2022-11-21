<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
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

        $path = (new Canonical())->get($request->getRequestUri());

        return view('index.index', compact('posts', 'data', 'meta', 'path'));
    }
}
