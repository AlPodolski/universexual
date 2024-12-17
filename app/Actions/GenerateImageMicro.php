<?php

namespace App\Actions;

use App\Models\Post;

class GenerateImageMicro
{
    public function generate(Post $post, $city)
    {
        $data =  [
            '@context' => 'https://schema.org',
            '@type' => 'ImageObject',
            'author' => $post->name,
            'contentUrl' => 'https://'.$_SERVER['HTTP_HOST'].'/600-700/thumbs/'.$post->avatar,
            'contentLocation' => $city.' Россия',
            'datePublished' => $post->created_at,
            'name' => 'Проститутка '. $post->name,
        ];

        $data = '<script type="application/ld+json">'.json_encode($data).'</script>';

        return $data;

    }
}
