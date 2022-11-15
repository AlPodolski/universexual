<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    public function getForMain($cityId)
    {
        $posts = Post::where('city_id', $cityId)->paginate(20);

        return $posts;
    }

    public function getSingle($id)
    {
        $post = Post::select('name', 'posts.id', 'not_younger', 'clothing_size', 'about', 'breast', 'avatar',
            'shoe_size', 'contacts_per_hour',
            'phone', 'rost', 'ves', 'age', 'price', 'nationals.value as national_value',
            'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
        )
            ->with('service')
            ->where('posts.id', $id)
            ->join('nationals', 'national_id', '=', 'nationals.id')
            ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
            ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
            ->first();

        return $post;
    }
}
