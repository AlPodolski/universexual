<?php

namespace App\Repository;

use App\Models\City;
use Cache;
use Carbon\Carbon;

class CityRepository
{
    public function getCity($cityUrl)
    {

        $expire = Carbon::now()->addHours(1200);

        $city = Cache::remember('city_' . $cityUrl, $expire, function () use ($cityUrl) {

            return City::whereUrl($cityUrl)->first();

        });

        return $city;
    }
}
