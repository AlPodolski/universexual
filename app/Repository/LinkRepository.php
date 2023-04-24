<?php

namespace App\Repository;

use App\Models\City;
use App\Models\Link;
use Cache;
use Carbon\Carbon;

class LinkRepository
{
    public function getLink($url)
    {

        $expire = Carbon::now()->addHours(1200);

        $link = Cache::remember('link_' . $url, $expire, function () use ($url) {

            return Link::where('from', $url)->get();

        });

        return $link;
    }
}
