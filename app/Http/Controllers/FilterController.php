<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
use App\Actions\GenerateBreadcrumbMicro;
use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    private $breadMicro;

    public function __construct()
    {
        $this->breadMicro = new GenerateBreadcrumbMicro();

        parent::__construct();
    }

    public function __invoke($city, $search, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForFilterCatalog($cityInfo['id'], $search);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $path = (new Canonical())->get($request->getRequestUri());

        $meta = $metaRepository->getForFilter($search, $cityInfo, $request);
        $breadMicro = $this->breadMicro->generate($request, $meta['h1']);

        return view('filter.index',
            compact('posts', 'data', 'meta', 'path', 'breadMicro')
        );
    }
}
