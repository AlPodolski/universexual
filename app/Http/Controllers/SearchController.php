<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke($city, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);
        $posts = $this->postRepository->getForSearch($cityInfo['id'], $request->get('name'));
        $meta = $this->metaRepository->getForSearch($request->get('name'));

        $path = '/';

        $sort = $this->sort;

        $search = true;

        return view('new.index.index', compact(
            'posts', 'data', 'meta', 'path', 'sort', 'search'
        ));
    }

    public function filter($city, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $dataSearch = $request->all();
        $posts = $this->postRepository->getForFilter($cityInfo['id'], $dataSearch);
        $meta = $this->metaRepository->getForSearch();
        $path = '/';

        $sort = $this->sort;

        $data = $this->dataRepository->getData($cityInfo['id']);

        $search = true;

        return view('new.index.index', compact(
            'posts', 'data', 'meta', 'path', 'sort', 'search', 'dataSearch'
        ));

    }

    public function more($city, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $request->all();
        $posts = $this->postRepository->getForFilter($cityInfo['id'], $data);

        $data['posts'] = view(PATH.'.include.more', compact('posts', 'cityInfo'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);
    }

    public function city(Request $request)
    {
        $city = $request->post('city');

        $cityList = City::where('city', 'like', '%'.$city.'%')->get();

        return view('files.search.city', compact('city', 'cityList'));

    }
}
