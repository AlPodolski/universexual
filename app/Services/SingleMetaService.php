<?php

namespace App\Services;

use App\Models\Post;

class SingleMetaService
{
    public function makeMetaTags(Post $post, $cityInfo): array
    {

        $data['title'] = $this->makeTitleForIntimBox($post, $cityInfo);
        $data['des'] = $this->makeDesForIntimBox($post, $cityInfo);
        $data['h1'] = $this->makeH1ForIntimBox($post, $cityInfo);

        return $data;
    }

    private function makeTitleForIntimBox(Post $post, $cityInfo): string
    {
        $title = $post->name . ' – жаркая индивидуалка ' . $cityInfo['city3'];

        if ($post->age) $title .= ', ' . $this->pluralAge($post->age);
        if ($post->breast) $title .= ', грудь ' . $post->breast;
        if ($post->rost) $title .= ', рост ' . $post->rost . ' см';
        if ($post->ves) $title .= ', вес ' . $post->ves . ' кг';

        if ($post->price) $title .= ' | от ' . $post->price . '₽';

        $title .= ' | анкета №' . $post->id;

        return $title;
    }

    private function makeDesForIntimBox(Post $post, $cityInfo): string
    {
        $des = '🔥 ' . $post->name . ' – настоящая находка для ценителей страсти ' . $cityInfo['city3'] . '.';

        if ($post->age) $des .= ', ' . $this->pluralAge($post->age);
        if ($post->breast) $des .= ', грудь ' . $post->breast;
        if ($post->rost) $des .= ', рост ' . $post->rost . ' см';
        if ($post->ves) $des .= ', вес ' . $post->ves . ' кг';

        if ($post->metro->count()) {

            $des .= ', рядом с метро ' . $post->metro->first()->metro_value;
        }

        $des .=  'реальные фото, без посредников. Анкета №' . $post->id;

        return $des;
    }

    private function makeH1ForIntimBox(Post $post, $cityInfo): string
    {
        $h1 = $post->name . ' – страстная индивидуалка ' . $cityInfo['city3'];

        return $h1;
    }

    private function pluralAge(int $age): string
    {
        $mod10 = $age % 10;
        $mod100 = $age % 100;

        if ($mod10 == 1 && $mod100 != 11) {
            return $age . ' год';
        }

        if ($mod10 >= 2 && $mod10 <= 4 && ($mod100 < 10 || $mod100 >= 20)) {
            return $age . ' года';
        }

        return $age . ' лет';
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
