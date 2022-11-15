<?php

namespace App\Repository;

use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Service;

class DataRepository
{
    public function getData($cityId): array
    {
        $data['national'] = National::all();
        $data['hair'] = HairColor::all();
        $data['intimHair'] = IntimHair::all();
        $data['service'] = Service::all();
        $data['metro'] = Metro::where(['city_id' => $cityId])->get();

        return $data;
    }
}
