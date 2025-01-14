<?php

namespace App\Repository;

use App\Models\Webmaster;
use Cache;
use Carbon\Carbon;

class WebmasterRepository
{
    public function get($city)
    {

        $expire = Carbon::now()->addHours(1200);

        $webmaster = Cache::remember('webmaster_'.$city, $expire, function () use ($city) {

            $webmaster = Webmaster::where(['url' => $city])
                ->first();

            if ($webmaster) return $webmaster;

            return false;

        });

        return $webmaster;
    }
}
