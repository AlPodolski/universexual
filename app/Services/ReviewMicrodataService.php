<?php

namespace App\Services;

use App\Models\Post;

class ReviewMicrodataService
{
    /**
     * Генерация JSON-LD разметки отзывов
     *
     * @param Post $posts Коллекция публикаций с отзывами
     */
    public function generate($posts): string
    {
        $reviews = [];
        /* @var $posts \App\Models\Post[]} */
        foreach ($posts as $post) {

            if (!$post->reviews->isEmpty()) {
                foreach ($post->reviews as $review) {
                    $reviews[] = [
                        '@type' => 'Review',
                        'author' => [
                            '@type' => 'Person',
                            'name' => $review->name,
                        ],
                        'reviewBody' => $review->text,
                        'itemReviewed' => [
                            '@type' => 'Person',
                            'name' => $post->name,
                            'age' => $post->age,
                            'url' => '/individualka/' . $post->url,
                        ],
                        'reviewRating' => [
                            '@type' => 'Rating',
                            'ratingValue' => $review->rating ?? 5,
                            'bestRating' => '5',
                        ],
                        'datePublished' => optional($review->created_at)->format('Y-m-d'),
                    ];
                }
            }

        }

        if ($reviews){

            $jsonLd = [
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'itemListElement' => $reviews,
            ];

            $data = '<script type="application/ld+json">'.json_encode($jsonLd).'</script>';

            return $data;

        }

        return false;

    }
}
