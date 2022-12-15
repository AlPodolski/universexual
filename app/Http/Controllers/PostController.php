<?php

namespace App\Http\Controllers;

use App\Services\SingleMetaService;

class PostController extends Controller
{
    public function __invoke($city,$id, SingleMetaService $metaService)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $post = $this->postRepository->getSingle($id);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaService->makeMetaTags($post, $cityInfo);

        return view('post.index', compact('post', 'data', 'meta'));
    }
}
