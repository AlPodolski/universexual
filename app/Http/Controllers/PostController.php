<?php

namespace App\Http\Controllers;

use App\Actions\GenerateBreadcrumbMicro;
use App\Services\SingleMetaService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $breadMicro;

    public function __construct()
    {
        $this->breadMicro = new GenerateBreadcrumbMicro();

        parent::__construct();
    }

    public function __invoke($city,$id, SingleMetaService $metaService, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $post = $this->postRepository->getSingle($id);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaService->makeMetaTags($post, $cityInfo);
        $breadMicro = $this->breadMicro->generate($request, $post->name);

        return view('post.index', compact('post', 'data', 'meta', 'breadMicro'));
    }
}
