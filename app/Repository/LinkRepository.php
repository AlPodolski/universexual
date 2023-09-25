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

        cache()->flush();

        $expire = Carbon::now()->addHours(1200);

        $link = Cache::remember('link_' . $url, $expire, function () use ($url) {

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
                    'to' => $url.'/dorogie-prostitutki',
                    'text' => 'Элитные',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/proverennye',
                    'text' => 'Проверенные',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/video',
                    'text' => 'С видео',
                );

                $link[] = array(
                    'from' => $url,
                    'to' => $url.'/uzbecka',
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
