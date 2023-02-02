<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke($city, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);
        $posts = $this->postRepository->getForSearch($cityInfo['id'], $request->get('name'));
        $meta = $this->metaRepository->getForSearch();

        $path = '/';

        $sort = $this->sort;

        $search = true;

        return view(PATH.'.index.index', compact(
            'posts', 'data', 'meta', 'path', 'sort', 'search'
        ));
    }

    public function filter($city, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $request->all();
        $posts = $this->postRepository->getForFilter($cityInfo['id'], $data);
        $meta = $this->metaRepository->getForSearch();
        $path = '/';

        $sort = $this->sort;

        $data = $this->dataRepository->getData($cityInfo['id']);

        $search = true;

        return view(PATH.'.index.index', compact(
            'posts', 'data', 'meta', 'path', 'sort', 'search'
        ));

    }
}
