<?php

namespace App\Http\Controllers;

use App\Actions\AddFavoriteToCookie;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {

    }

    public function add(Request $request, AddFavoriteToCookie $addFavoriteToCookie)
    {
        $id = $request->post('id');

        $addFavoriteToCookie->add($id);

        return true;
    }
}
