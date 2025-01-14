<?php

namespace App\Repository;

use App\Models\Text;

class TextRepository
{
    public function getText($cityId, $url)
    {
        $text = Text::where('city_id', $cityId)->where('page_url', $url)->first();

        return $text;

    }
}
