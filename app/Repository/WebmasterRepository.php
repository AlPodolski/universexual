<?php

namespace App\Repository;

use App\Models\Webmaster;

class WebmasterRepository
{
    public function get($city)
    {

        $webmaster = \Cache::get('webmaster_'.$city);

        if (!$webmaster){

            $webmaster = Webmaster::where(['url' => $city])->first();

            \Cache::set('webmaster_'.$city, $webmaster);

        }

        return $webmaster;
    }
}
