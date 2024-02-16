<?php

namespace App\Repository;

use App\Actions\GetSort;
use App\Models\Filter;
use App\Models\Post;
use Cache;
use Carbon\Carbon;

class PostRepository
{

    protected string $sort;

    public function __construct()
    {
        $this->sort = (new GetSort())->get(\Cookie::get('sort') ?? 'default');
    }

    public function getForMain($cityId)
    {
        $posts = Post::where('city_id', $cityId)
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION])
            ->with('metro', 'reviews', 'city', 'place', 'national', 'service')
            ->orderByRaw($this->sort)
            ->paginate(20);

        return $posts;
    }

    /**
     * @param $id
     * @return Post|null
     */
    public function getSingle($url)
    {

        $expire = Carbon::now()->addHours(1200);

        $post = Cache::remember('post_' . $url . '_site_id_' . SITE, $expire, function () use ($url) {

            $post = Post::select('posts.*', 'nationals.value as national_value',
                'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
            )
                ->with('service', 'metro', 'place', 'reviews', 'photo', 'rayon')
                ->where('posts.url', $url)
                ->where('site_id', SITE_ID)
                ->join('nationals', 'national_id', '=', 'nationals.id')
                ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
                ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
                ->first();

            return $post;

        });

        if (isset($post->single_view)){
            $post->single_view = $post->single_view + 1;
            $post->save();
        }



        return $post;
    }

    public function getForFilterCatalog($cityId, $searchData)
    {

        $salon = false;
        $indi = false;

        $searchData = explode('/', $searchData);

        $posts = Post::where(['city_id' => $cityId])
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION]);

        foreach ($searchData as $search){

            if (strpos($search, 'intim-salony') !== false)
                $salon = true;

            if (strpos($search, 'individualki') !== false)
                $indi = true;

            if (strpos($search, 'tolstye') !== false)
                $posts = $posts->where('ves', '>=', 80);

            if (strpos($search, 'hudye') !== false)
                $posts = $posts->where('ves', '<', 60);

            if (strpos($search, 'visokie') !== false)
                $posts = $posts->where('rost', '>=', 170);

            if (strpos($search, 'nizkie') !== false)
                $posts = $posts->where('rost', '<', 170);

            if (strpos($search, '18-let') !== false)
                $posts = $posts->where('age', '=', 18);

            if (strpos($search, 'do-20-let') !== false)
                $posts = $posts->where('age', '<', 21);

            if (strpos($search, 'molodye-prostitutki') !== false)
                $posts = $posts->where('age', '<', 26);

            if (strpos($search, 'vzroslye-prostitutki') !== false){
                $posts = $posts->where('age', '>', 34);
                $posts = $posts->where('age', '<', 46);
            }

            if (strpos($search, 'prostitutki-21-25-let') !== false){
                $posts = $posts->where('age', '>', 20);
                $posts = $posts->where('age', '<', 26);
            }

            if (strpos($search, 'prostitutki-26-30-let') !== false){
                $posts = $posts->where('age', '>', 25);
                $posts = $posts->where('age', '<', 31);
            }

            if (strpos($search, 'prostitutki-31-40-let') !== false){
                $posts = $posts->where('age', '>', 30);
                $posts = $posts->where('age', '<', 41);
            }

            if (strpos($search, 'prostitutki-40-50-let') !== false){
                $posts = $posts->where('age', '>', 39);
                $posts = $posts->where('age', '<', 51);
            }

            if (strpos($search, 'starye-prostitutki') !== false)
                $posts = $posts->where('age', '>', 45);

            if (strpos($search, 'prostitutki-ot-50-let') !== false)
                $posts = $posts->where('age', '>', 49);

            if (strpos($search, 'dorogie-prostitutki') !== false)
                $posts = $posts->where('price', '>', 4999);

            if (strpos($search, 'deshevye-prostitutki') !== false)
                $posts = $posts->where('price', '<', 3001);

            if (strpos($search, 'do-1500-rub') !== false)
                $posts = $posts->where('price', '<', 1501);

            if (strpos($search, '2000-3000-rub') !== false){
                $posts = $posts->where('price', '>', 1999);
                $posts = $posts->where('price', '<', 3001);
            }

            if (strpos($search, '3000-4000-rub') !== false){
                $posts = $posts->where('price', '>', 2999);
                $posts = $posts->where('price', '<', 4001);
            }

            if (strpos($search, '4000-5000-rub') !== false){
                $posts = $posts->where('price', '>', 3999);
                $posts = $posts->where('price', '<', 5001);
            }

            if (strpos($search, '5000-6000-rub') !== false){
                $posts = $posts->where('price', '>', 4999);
                $posts = $posts->where('price', '<', 6001);
            }

            if (strpos($search, 'ot-10000-rub') !== false){
                $posts = $posts->where('price', '>', 9999);
            }

            if (strpos($search, 'proverennye') !== false)
                $posts = $posts->where('check_photo_status', 1);

            if (strpos($search, 'video') !== false)
                $posts = $posts->where('video', '<>', null);

            if (strpos($search, 'novye') !== false)
                $posts = $posts->orderByDesc('id');

            $expire = Carbon::now()->addHours(1200);

            $filter = Cache::remember('filter_' . $search, $expire, function () use ($search) {
                return Filter::where('url', $search)->first();
            });

            if ($filter) {

                if ($filter->related_table == 'post_services') {

                    $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_services` where ' . $filter->related_column . ' =  ? and `city_id` = ?) ',
                        [$filter->related_id, $cityId]);

                }
                if ($filter->related_table == 'post_metros') {

                    $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_metros` where ' . $filter->related_column . ' =  ?  and `city_id` = ?) ',
                        [$filter->related_id, $cityId]);

                }
                if ($filter->related_table == 'post_places') {

                    $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_places` where ' . $filter->related_column . ' =  ?  and `city_id` = ?) ',
                        [$filter->related_id, $cityId]);

                }
                if ($filter->related_table == 'post_times') {

                    $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_times` where ' . $filter->related_column . ' =  ?  and `city_id` = ?) ',
                        [$filter->related_id, $cityId]);

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

        }

        //dd($posts->getQuery()->wheres);

        if ($salon) $posts = $posts->where('type', Post::SALON_TYPE);
        if ($indi) $posts = $posts->where('type', Post::INDI_TYPE);

        if (count($posts->getQuery()->wheres) <= 2 and !$posts->getQuery()->orders) abort(404);

        $posts = $posts
            ->with('place', 'reviews', 'city', 'metro', 'national', 'service')
            ->orderByRaw($this->sort)
            ->paginate(20);

        return $posts;

    }

    public function getForSearch($cityId, $name)
    {
        $posts = Post::where('city_id', $cityId)
            ->where('name', 'like', '%' . $name . '%')
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION])
            ->with('reviews', 'city', 'national', 'service')
            ->orderByRaw($this->sort)
            ->paginate(20);

        return $posts;

    }

    public function getForMap($cityId): string
    {
        $posts = Post::where('city_id', $cityId)
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION])
            ->with('metro')
            ->limit(2000)
            ->get();

        $result = array();

        foreach ($posts as $post) {

            if ($metro = $post->metro->first()) {

                $result[] = [
                    'avatar' => '/211-300/thumbs/' . $post->avatar,
                    'phone' => $post->phone,
                    'url' => $post->url,
                    'price' => $post->price,
                    'x' => $metro->x,
                    'y' => $metro->y,
                ];

            }

        }

        return json_encode($result);

    }

    public function getForFilter($cityId, $data)
    {
        $posts = Post::where('age', '>=', $data['age-from'])
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION])
            ->where('age', '<=', $data['age-to'])
            ->where('ves', '>=', $data['ves-from'])
            ->where('ves', '<=', $data['ves-to'])
            ->where('breast', '>=', $data['grud-from'])
            ->where('breast', '<=', $data['grud-to'])
            ->where('price', '>=', $data['price-from'])
            ->where('price', '<=', $data['price-to'])
            ->where(['city_id' => $cityId]);

        if (isset($data['rost-from'])){
            $posts = $posts->where('rost', '>=', $data['rost-from'])
                ->where('rost', '<=', $data['rost-to']);
        }

        if (isset($data['metro']) and $data['metro']) {

            $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_metros` where `metros_id` =  ?) ',
                [$data['metro']]);

        }

        $posts = $posts
            ->orderByRaw($this->sort)
            ->paginate(20);

        return $posts;
    }

    public function getView()
    {
        if ($ids = \Cookie::get('post_view')) {

            $data = unserialize($ids);

            $posts = Post::with('metro')
                ->whereIn('id', $data)
                ->get();

            return $posts;

        }

        return false;

    }

    public function getMore($cityId, $limit)
    {
        $posts = Post::where(['city_id' => $cityId])
            ->where(['site_id' => SITE_ID, 'publication_status' => Post::POST_ON_PUBLICATION])
            ->with('metro', 'city', 'national', 'service')
            ->orderByRaw('RAND()')
            ->limit($limit)->get();

        return $posts;
    }

    public function getFavorite()
    {
        if ($ids = \Cookie::get('post_favorite')) {

            $data = unserialize($ids);

            $posts = Post::with('metro', 'national')
                ->whereIn('id', $data)
                ->paginate(20);

            return $posts;

        }

        return false;
    }

}
