<?php

namespace App\Http\Controllers;

use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke($city, $search, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForFilter($cityInfo['id'], $search);
        $data = $this->dataRepository->getData($cityInfo['id']);

        \Cache::flush();
        $meta = $metaRepository->getForFilter($search, $cityInfo, $request);

        return view('index.index', compact('posts', 'data', 'meta'));
    }
}
