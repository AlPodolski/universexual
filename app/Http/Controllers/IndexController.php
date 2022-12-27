<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
use App\Actions\GenerateMicroDataForCatalog;
use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private GenerateMicroDataForCatalog $microData;

    public function __construct()
    {
        $this->microData = new GenerateMicroDataForCatalog();
        parent::__construct();
    }

    public function __invoke($city, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForMain($cityInfo['id']);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaRepository->getForMain('/', $cityInfo, $request);

        $path = (new Canonical())->get($request->getRequestUri());

        $productMicro = false;

        if ($posts) $productMicro = $this->microData->generate($meta['title'], $posts, '/', $cityInfo['id']);

        $sort = $this->sort;

        return view('index.index', compact(
            'posts', 'data', 'meta', 'path', 'productMicro', 'sort'
        ));
    }

    public function more($city)
    {

        $cityInfo = $this->cityRepository->getCity($city);

        $posts = $this->postRepository->getForMain($cityInfo['id']);

        $data['posts'] = view('include.more', compact('posts', 'cityInfo'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);
    }

}
