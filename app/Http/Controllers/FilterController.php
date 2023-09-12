<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
use App\Actions\GenerateBreadcrumbMicro;
use App\Actions\GenerateMicroDataForCatalog;
use App\Models\Filter;
use App\Models\Link;
use App\Models\Metro;
use App\Models\MetroNear;
use App\Repository\LinkRepository;
use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    private GenerateBreadcrumbMicro $breadMicro;
    private GenerateMicroDataForCatalog $microData;
    private LinkRepository $linkRepository;

    public function __construct()
    {
        $this->breadMicro = new GenerateBreadcrumbMicro();
        $this->microData = new GenerateMicroDataForCatalog();
        $this->linkRepository = new LinkRepository();

        parent::__construct();
    }

    public function __invoke($city, $search, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $posts = $this->postRepository->getForFilterCatalog($cityInfo['id'], $search);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $path = (new Canonical())->get($request->getRequestUri());

        $filterParams = Filter::where('url', $search )->get();

        $meta = $metaRepository->getForFilter($search, $cityInfo, $filterParams);
        $breadMicro = $this->breadMicro->generate($request, $meta['h1']);

        $productMicro = false;

        if ($posts) $productMicro = $this->microData->generate($meta['title'], $posts, $search, $cityInfo['id']);

        if (isset($filterParams[0]->short_name) and $filterParams[0]->short_name == 'metro'){

            $data['current_metro'] = Metro::where(['id' => $filterParams[0]->related_id ])->first();
            $data['near_metro'] = MetroNear::where(['metro_id' => $filterParams[0]->related_id ])
                ->with('metro')
                ->get();

        }

        $links = $this->linkRepository->getLink($search, $filterParams);

        return view(PATH.'.filter.index',
            compact('posts', 'data', 'meta', 'path', 'breadMicro', 'productMicro', 'links')
        );
    }

    public function more($city, $search)
    {

        $cityInfo = $this->cityRepository->getCity($city);

        $posts = $this->postRepository->getForFilterCatalog($cityInfo['id'], $search);

        $data['posts'] = view(PATH.'.include.more', compact('posts', 'cityInfo'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);
    }

}
