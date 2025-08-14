<?php

namespace App\Repository;

use App\Actions\GetSort;
use App\Models\Filter;
use App\Models\Post;
use Cache;
use Carbon\Carbon;
use DB;

class PostRepository
{

    protected string $sort;

    private $postLimit = 21;

    public function __construct()
    {
        $this->sort = (new GetSort())->get(\Cookie::get('sort') ?? 'default');
    }

    public function getForMain($cityId)
    {
        $posts = Post::where('city_id', $cityId)
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->with('metro', 'city', 'photo', 'checkPhoto')
            ->orderByRaw($this->sort)
            ->paginate($this->postLimit);

        return $posts;
    }

    /**
     * @param $id
     * @return Post|null
     */
    public function getSingle($url)
    {

        $expire = Carbon::now()->addHours(1200);

        $post = Cache::remember('post_' . $url, $expire, function () use ($url) {

            $post = Post::select('posts.*', 'nationals.value as national_value',
                'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
            )
                ->with('service', 'metro', 'place', 'reviews', 'photo', 'rayon')
                ->where('posts.url', $url)
                ->join('nationals', 'national_id', '=', 'nationals.id')
                ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
                ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
                ->first();

            return $post;

        });

        if (isset($post->single_view)) {
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

        $posts = Post::where(['city_id' => $cityId, 'publication_status' => Post::POST_ON_PUBLICATION]);

        foreach ($searchData as $search) {
            if (strpos($search, 'intim-salony') !== false) $salon = true;
            if (strpos($search, 'individualki') !== false) $indi = true;
            if (strpos($search, 'tolstye-prostitutki') !== false) $posts->where('ves', '>=', 80);
            if (strpos($search, 'hudye') !== false) $posts->where('ves', '<', 60);
            if (strpos($search, 'visokie') !== false) $posts->where('rost', '>=', 170);
            if (strpos($search, 'nizkie') !== false) $posts->where('rost', '<', 170);
            if (strpos($search, '18-let') !== false) $posts->where('age', '=', 18);
            if (strpos($search, 'do-20-let') !== false) $posts->where('age', '<', 21);
            if (strpos($search, 'molodye-prostitutki') !== false) $posts->where('age', '<', 26);
            if (strpos($search, 'zrelye-prostitutki') !== false) $posts->whereBetween('age', [35, 45]);
            if (strpos($search, '21-25-let') !== false) $posts->whereBetween('age', [21, 25]);
            if (strpos($search, '26-30-let') !== false) $posts->whereBetween('age', [26, 30]);
            if (strpos($search, '31-40-let') !== false) $posts->whereBetween('age', [31, 40]);
            if (strpos($search, '40-50-let') !== false) $posts->whereBetween('age', [40, 50]);
            if (strpos($search, 'starye') !== false) $posts->where('age', '>', 45);
            if (strpos($search, 'ot-50-let') !== false) $posts->where('age', '>', 49);
            if (strpos($search, 'elitnye-prostitutki') !== false) $posts->where('price', '>', 4999);
            if (strpos($search, 'deshevye-prostitutki') !== false) $posts->where('price', '<', 3001);
            if (strpos($search, 'proverennye-prostitutki') !== false) $posts->where('check_photo_status', 1);
            if (strpos($search, 'individualki-s-video') !== false) $posts->whereNotNull('video');
            if (strpos($search, 'novye-prostitutki') !== false) $posts->orderByDesc('id');

            $expire = Carbon::now()->addHours(1200);

            $filter = Cache::remember('filter_' . $search, $expire, function () use ($search) {
                return Filter::where('url', $search)->first();
            });

            if ($filter) {
                switch ($filter->related_table) {
                    case 'post_services':
                        $posts->whereRaw("id IN (select posts_id from {$filter->related_table} where {$filter->related_column} = ? and city_id = ? and not_available = 0)", [$filter->related_id, $cityId]);
                        break;
                    case 'post_metros':
                    case 'post_places':
                    case 'post_times':
                        $posts->whereRaw("id IN (select posts_id from {$filter->related_table} where {$filter->related_column} = ? and city_id = ?)", [$filter->related_id, $cityId]);
                        break;
                    case 'rayons':
                    case 'nationals':
                    case 'hair_color':
                    case 'intim_hair':
                        $posts->where($filter->related_column, $filter->related_id);
                        break;
                }
            }
        }

        if ((count($posts->getQuery()->wheres) <= 1) and empty($posts->getQuery()->orders) ) {
            abort(404);
        }

        return $posts
            ->with(['metro', 'city', 'photo', 'checkPhoto'])
            ->orderByRaw($this->sort)
            ->paginate($this->postLimit);
    }

    public function getForSearch($cityId, $name)
    {
        $posts = Post::where('city_id', $cityId)
            ->where('name', 'like', '%' . $name . '%')
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->with('metro', 'city', 'photo', 'checkPhoto')
            ->orderByRaw($this->sort)
            ->paginate($this->postLimit);

        return $posts;

    }

    public function getForMap($cityId): string
    {
        $posts = Post::where('city_id', $cityId)
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
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

        $data = array_map(function ($item) {
            // Удаляем все, кроме цифр (0-9)
            return preg_replace('/[^0-9]/', '', $item);
        }, $data);

        $posts = Post::where('age', '>=', $data['age-from'])
            ->with(['metro', 'city', 'photo', 'checkPhoto'])
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->where('age', '<=', $data['age-to'])
            ->where('ves', '>=', $data['ves-from'])
            ->where('ves', '<=', $data['ves-to'])
            ->where('breast', '>=', $data['grud-from'])
            ->where('breast', '<=', $data['grud-to'])
            ->where('price', '>=', $data['price-from'])
            ->where('price', '<=', $data['price-to'])
            ->where(['city_id' => $cityId]);

        if (isset($data['rost-from'])) {
            $posts = $posts->where('rost', '>=', $data['rost-from'])
                ->where('rost', '<=', $data['rost-to']);
        }
        if (isset($data['national_id']) and $data['national_id']) {
            $posts = $posts->where('national_id', $data['national_id']);
        }

        if (isset($data['metro']) and $data['metro']) {

            $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_metros` where `metros_id` =  ?) ',
                [$data['metro']]);

        }

        $posts = $posts
            ->orderByRaw($this->sort)
            ->paginate($this->postLimit)->appends($data);

        return $posts;
    }

    public function getView($notPostId, $limit = 20)
    {
        if ($ids = \Cookie::get('post_view')) {

            $data = array_reverse(unserialize($ids));

            $posts = Post::with('metro')
                ->whereIn('id', $data)
                ->where('id', '<>', $notPostId)
                ->limit($limit)
                ->get();

            return $posts;

        }

        return false;

    }

    public function getMore($cityId, $limit)
    {

        $expire = Carbon::now()->addMinutes(1);

        $posts = Cache::remember('more_post_' . $cityId, $expire, function () use ($cityId, $limit) {

            $posts = Post::where(['city_id' => $cityId])
                ->where(['publication_status' => Post::POST_ON_PUBLICATION])
                ->with('metro')
                ->orderByRaw('RAND()')
                ->limit($limit)->get();

            return $posts;

        });

        return $posts;
    }

    public function getFavorite()
    {
        if ($ids = \Cookie::get('post_favorite')) {

            $data = unserialize($ids);

            $posts = Post::with('metro', 'national')
                ->whereIn('id', $data)
                ->paginate($this->postLimit);

            return $posts;

        }

        return false;
    }

}
