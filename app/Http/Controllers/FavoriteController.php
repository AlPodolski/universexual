<?php

namespace App\Http\Controllers;

use App\Actions\AddFavoriteToCookie;
use App\Repository\MetaRepository;
use App\Repository\PostRepository;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index($city,PostRepository $postRepository, MetaRepository $metaRepository, Request $request)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);
        $posts = $postRepository->getFavorite();

        $meta = $metaRepository->getForFavorite();

        return view(PATH.'.index.index', compact('posts', 'data', 'meta'));
    }

    public function add(Request $request, AddFavoriteToCookie $addFavoriteToCookie)
    {
        $id = $request->post('id');

        $addFavoriteToCookie->add($id);

        return true;
    }
}
