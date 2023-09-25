<?php

namespace App\Repository;

use App\Models\Filter;
use Cache;
use Carbon\Carbon;

class FilterRepository
{
    public function getData($search)
    {

        $expire = Carbon::now()->addHours(1200);

        $data = Cache::remember('link_' . $search, $expire, function () use ($search) {

            if (strpos($search, '/')){

                $data = explode('/', $search);

                return Filter::whereIn('url', $data )->get();

            }

            return Filter::where('url', $search )->get();

        });

        return $data;


    }
}
