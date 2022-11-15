<?php

namespace App\Repository;

use App\Models\City;

class CityRepository
{
    public function getCity($city)
    {
        $city = City::whereUrl($city)->first();

        return $city;
    }
}
