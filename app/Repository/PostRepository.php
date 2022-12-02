<?php

namespace App\Repository;

use App\Models\City;
use App\Models\Filter;
use App\Models\Post;
use Cache;
use Carbon\Carbon;

class PostRepository
{
    public function getForMain($cityId)
    {
        $posts = Post::where('city_id', $cityId)->paginate(20);

        return $posts;
    }

    public function getSingle($id)
    {

        $expire = Carbon::now()->addHours(1200);

        $post = Cache::remember('post_' . $id, $expire, function () use ($id) {

            $post = Post::select('name', 'posts.id', 'not_younger', 'clothing_size', 'about', 'breast', 'avatar',
                'shoe_size', 'contacts_per_hour', 'check_photo_status',
                'rayons.url as rayon_url', 'rayons.value as rayon_value',
                'phone', 'rost', 'ves', 'age', 'price', 'nationals.value as national_value',
                'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
            )
                ->with('service', 'metro', 'place', 'reviews')
                ->where('posts.id', $id)
                ->join('nationals', 'national_id', '=', 'nationals.id')
                ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
                ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
                ->join('rayons', 'rayon_id', '=', 'rayons.id')
                ->first();

            return $post;

        });

        return $post;
    }

    public function getForFilter($cityId, $search)
    {
        $posts = Post::where(['city_id' => $cityId]);

        if (strpos($search, 'tolstye') !== false)
            $posts = $posts->where('ves', '>=', 80);

        if (strpos($search, 'hudye') !== false)
            $posts = $posts->where('ves', '<', 60);

        if (strpos($search, 'molodye-prostitutki') !== false)
            $posts = $posts->where('age', '<', 26);

        if (strpos($search, 'starye-prostitutki') !== false)
            $posts = $posts->where('age', '>', 45);

        if (strpos($search, 'dorogie-prostitutki') !== false)
            $posts = $posts->where('price', '>', 4999);

        if (strpos($search, 'deshevye-prostitutki') !== false)
            $posts = $posts->where('price', '<', 3001);

        if (strpos($search, 'proverennye') !== false)
            $posts = $posts->where('check_photo_status', 1);

        $expire = Carbon::now()->addHours(1200);

        $filter = Cache::remember('filter_' . $search, $expire, function () use ($search) {
            return Filter::where('url', $search)->first();
        });

        if ($filter) {

            if ($filter->related_table == 'post_services') {

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_services` where ' . $filter->related_column . ' =  ?) ',
                    [$filter->related_id]);

            }
            if ($filter->related_table == 'post_metros') {

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_metros` where ' . $filter->related_column . ' =  ?) ',
                    [$filter->related_id]);

            }
            if ($filter->related_table == 'post_places') {

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_places` where ' . $filter->related_column . ' =  ?) ',
                    [$filter->related_id]);

            }
            if ($filter->related_table == 'post_times') {

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_times` where ' . $filter->related_column . ' =  ?) ',
                    [$filter->related_id]);

            }
            if ($filter->related_table == 'rayons') {
                $posts = $posts->where($filter->related_column, $filter->related_id);
            }

            if ($filter->related_table == 'nationals') {
                $posts = $posts->where($filter->related_column, $filter->related_id);
            }

            if ($filter->related_table == 'hair_color') {
                $posts = $posts->where($filter->related_column, $filter->related_id);
            }

            if ($filter->related_table == 'intim_hair') {
                $posts = $posts->where($filter->related_column, $filter->related_id);
            }

        }

        //dd($posts->getQuery()->wheres);

        $posts = $posts->paginate(20);

        return $posts;

    }

    public function getForSearch($cityId, $name)
    {
        $posts = Post::where('city_id', $cityId)
            ->where('name', 'like', '%' . $name . '%')
            ->paginate(20);

        return $posts;

    }
}
