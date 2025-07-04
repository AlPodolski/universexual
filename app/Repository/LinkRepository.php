<?php

namespace App\Repository;

use App\Models\Filter;
use App\Models\Link;
use Cache;
use Carbon\Carbon;

class LinkRepository
{
    public function getLink($url, $filterParams)
    {

        $expire = Carbon::now()->addHours(10);

        $link = array();

        $link = Cache::remember('link_' . $url.'1', $expire, function () use ($url) {

            $data = Link::where('from', $url)->get();

            if ($data->count()) return $data->toArray();

        });

        if ($filterParams->count() == 1){

            $data = $filterParams->first();

            /* @var $data Filter */

            if ($data->short_name == 'metro' or $data->short_name == 'rayon'){

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/deshevye-prostitutki',
                    'text' => 'Дешевые',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/elitnye-prostitutki',
                    'text' => 'Элитные',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/proverennye-prostitutki',
                    'text' => 'Проверенные',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/uzbechki',
                    'text' => 'Узбечки',
                );

            }

            if ($data->short_name == 'national'){

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/deshevye-prostitutki',
                    'text' => 'Дешевые',
                );

            }

            if ($data->short_name == 'service'){

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/deshevye-prostitutki',
                    'text' => 'Дешевые',
                );

            }

        }

        return $link;
    }
}
