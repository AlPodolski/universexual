<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Repository\MetaRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($city, MetaRepository $metaRepository, Request $request)
    {

        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $meta = $metaRepository->getForBlog($request->url(), $cityInfo, $request);

        $posts = BlogPost::orderByDesc('id')->paginate(20);

        return view('blog.index', compact('meta', 'data', 'posts'));
    }

    public function post($city, $url)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $post = BlogPost::where('url', $url)->first();

        return view('blog.post', compact('post', 'data', 'cityInfo'));
    }
}
