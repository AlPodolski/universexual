<?php

namespace App\Repository;

use App\Models\Webmaster;

class WebmasterRepository
{
    public function get($city)
    {

        $webmaster = \Cache::get('webmaster_'.$city.'_site_id_'.SITE_ID);

        if (!$webmaster){

            $webmaster = Webmaster::where(['url' => $city])
                ->where(['site_id' => SITE_ID])
                ->first();

            \Cache::set('webmaster_'.$city.'_site_id_'.SITE_ID, $webmaster);

        }

        return $webmaster;
    }
}
