<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::select('name', 'not_younger', 'clothing_size', 'about', 'breast', 'avatar',
            'shoe_size', 'contacts_per_hour',
            'phone', 'rost', 'ves', 'age', 'price', 'nationals.value as national_value',
            'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
        )
            ->where('posts.id', $id)
            ->join('nationals', 'national_id', '=', 'nationals.id')
            ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
            ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
            ->first();

        $data = $this->dataRepository->getData();

        return view('post.index', compact('post', 'data'));
    }
}
