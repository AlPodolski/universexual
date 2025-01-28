<?php

namespace App\Repository;

use App\Models\Text;
use Illuminate\Support\Facades\Cache;

class TextRepository
{
    public function getText($cityId, $url, $request)
    {

        if (!$request->has('page')){

            $text = Cache::remember("text_{$cityId}_{$url}", 86400, function () use ($cityId, $url) {
                return Text::where('city_id', $cityId)
                    ->where('page_url', $url)
                    ->first();
            });

            return $text;

        }

    }
}
