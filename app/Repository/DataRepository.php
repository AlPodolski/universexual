<?php

namespace App\Repository;

use App\Models\National;

class DataRepository
{
    public function getData()
    {
        $data['national'] = National::all();

        return $data;
    }
}
