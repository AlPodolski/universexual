<?php

namespace App\Actions;

use App\Models\Post;

class GenerateProductMicroForSingle
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;

        return $this;
    }

    public function generate($cityInfo)
    {

        $person = [
            "@context" => "https://schema.org",
            "@type" => "Person",
            "name" => $this->post->name,
            "description" => $this->getDes($cityInfo),
            "gender" => "Female",
            "image" => $_SERVER['HTTP_HOST'] . '/700-700/thumbs/' . $this->post->avatar,
            "url" => $_SERVER['HTTP_HOST'] . '/individualka/' . $this->post->url,
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => $cityInfo['city'],
                "addressCountry" => "Россия"
            ]
        ];

        $data = json_encode($person);

        return '<script type="application/ld+json">' . $data . '</script>';

    }

    private function getDes($cityInfo)
    {

        if ($this->post->price >= 7000) {
            $result = 'Элитный эскорт, ';
        } else {
            $result = 'Эскорт, ';
        }

        if ($this->post->age) $result .= 'возраст ' . $this->post->age . ', ';
        if ($this->post->ves) $result .= 'вес ' . $this->post->ves . ', ';

        $result .= 'Предоставляет услуги ' . $cityInfo['city3'];

        return $result;

    }

}
