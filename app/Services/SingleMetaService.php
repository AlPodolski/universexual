<?php

namespace App\Services;

use App\Models\Post;

class SingleMetaService
{
    public function makeMetaTags(Post $post, $cityInfo): array
    {

        if (SITE_ID == 1){
            $data['title'] = $this->makeTitle($post, $cityInfo);
            $data['des'] = $this->makeDes($post, $cityInfo);
        }
        elseif (SITE_ID == 2){
            $data['title'] = $this->makeTitleForIntimBox($post, $cityInfo);
            $data['des'] = $this->makeDesForIntimBox($post, $cityInfo);
        }

        return $data;
    }

    private function makeTitleForIntimBox(Post $post, $cityInfo): string
    {

        $title = 'Проститутка '.$post->name . ' ID '.$post->id;

        if ($post->breast) $title .= ', грудь '.$post->breast;
        if ($post->ves) $title .= ', вес '.$post->ves;
        if ($post->rost) $title .= ', рост '.$post->rost;

        if ($post->price) $title .= ' – от '.$post->price .' руб. ';

        $title .= ' '.$cityInfo['city3'] ;

        return $title;

    }

    private function makeDesForIntimBox(Post $post, $cityInfo): string
    {

        $des = 'Анкета проститутки '.$post->name . ' '.$post->id . ' с фото, ценами и параметрами. Если понравилась и хочешь снять – звони ей по номеру ';

        $des .= $post->phone;

        return $des;

    }

    private function makeTitle(Post $post, $cityInfo): string
    {

        $title = 'Проститутка '.$post->name;

        if ($post->metro->count()) $title .= ' рядом с метро '.$post->metro->first()->metro_value;
        $title .= ' '.$cityInfo['city3'] . ' '.$post->phone . ' цена '.$post->price .' ID '.$post->id;

        return $title;

    }

    private function makeDes(Post $post, $cityInfo): string
    {

        if (mb_strlen($post->about) > 200) $des = mb_substr($post->about, 0, 200). ' ID '.$post->id;

        else{

            $des = 'Проститутка '.$post->name . ' '.$cityInfo['city3'] .' номер телефона '.$post->phone;
            $des .= ' лучшие индивидуалки '.$cityInfo['city3'].' ID анкеты'.' '.$post->id;

        }

        return $des;

    }

}
