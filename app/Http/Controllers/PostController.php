<?php

namespace App\Http\Controllers;

use App\Actions\GenerateBreadcrumbMicro;
use App\Actions\GenerateImageMicro;
use App\Services\SingleMetaService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private GenerateBreadcrumbMicro $breadMicro;
    private GenerateImageMicro $imageMicro;

    public function __construct()
    {
        $this->breadMicro = new GenerateBreadcrumbMicro();
        $this->imageMicro = new GenerateImageMicro();

        parent::__construct();
    }

    public function __invoke($city,$url, SingleMetaService $metaService, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $post = $this->postRepository->getSingle($url);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaService->makeMetaTags($post, $cityInfo);
        $breadMicro = $this->breadMicro->generate($request, $post->name);
        $imageMicro = $this->imageMicro->generate($post, $cityInfo['city']);

        return view('post.index', compact(
            'post', 'data', 'meta', 'breadMicro', 'imageMicro'
        ));
    }
}
