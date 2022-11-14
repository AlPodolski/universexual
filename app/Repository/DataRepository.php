<?php

namespace App\Repository;

use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\National;

class DataRepository
{
    public function getData(): array
    {
        $data['national'] = National::all();
        $data['hair'] = HairColor::all();
        $data['intimHair'] = IntimHair::all();

        return $data;
    }
}
