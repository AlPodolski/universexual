<?php

namespace App\Repository;

use App\Models\HairColor;
use App\Models\National;

class DataRepository
{
    public function getData(): array
    {
        $data['national'] = National::all();
        $data['hair'] = HairColor::all();

        return $data;
    }
}
