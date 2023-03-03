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

    public function generate(): array
    {

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $this->post->name,
            'description' => $this->post->about,
            'image' => '/252-309/thumbs/'.$this->post->avatar,
            'offers' => [
                '@type' => 'Offer',
                'availability' => 'https://schema.org/InStock',
                'price' => $this->post->price,
                'priceCurrency' => 'RUR',
            ],

        ];

        if ($this->post->reviews->count()){
            $data[] = ['review' => $this->makeReview()];
            $data[] = [
                'aggregateRating' => [
                    '@type' => 'AggregateRating',
                    'ratingValue' => $this->countRating(),
                    'worstRating' => 1,
                    'bestRating' => 5,
                    'reviewCount' => $this->post->reviews->count()
                ],
            ];
        }

        return $data;

    }

    private function makeReview(): array
    {

        $result = array();

        foreach ($this->post->reviews as $item){

            $result[] = [
                '@type' => 'Review',
                'author' => $item->name,
                'datePublished' => \Carbon\Carbon::parse($item->updated_at )->toDateString(),
                'reviewBody' => $item->text,
                'name' => $item->name,
                'reviewRating' => [
                    '@type' => 'Rating',
                    'bestRating' => 5,
                    'ratingValue' => $item->rating,
                    'worstRating' => 1,
                ]
            ];

        }

        return $result;

    }

    private function countRating(): int
    {

        $sum = 0;

        foreach ($this->post->reviews as $item){

            $sum = $sum + $item->rating;

        }

        return $sum / $this->post->reviews->count();

    }

}
/*
 *
 */
