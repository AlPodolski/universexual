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

    public function generate()
    {

        if (!$this->post->reviews->count()) return false;

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $this->post->name,
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => $this->countRating(),
                'worstRating' => 1,
                'bestRating' => 5,
                'reviewCount' => $this->post->reviews->count()
            ],
            'description' => $this->post->about,
            'image' => '/252-309/thumbs/'.$this->post->avatar,
            'offers' => [
                '@type' => 'Offer',
                'availability' => 'https://schema.org/InStock',
                'price' => $this->post->price,
                'priceCurrency' => 'RUR',
            ],
            'review' => $this->makeReview()
        ];

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
 *   "@context": "https://schema.org",
  "@type": "Product",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "3.5",
    "reviewCount": "11"
  },
  "description": "0.7 cubic feet countertop microwave. Has six preset cooking categories and convenience features like Add-A-Minute and Child Lock.",
  "name": "Kenmore White 17\" Microwave",
  "image": "kenmore-microwave-17in.jpg",
  "offers": {
    "@type": "Offer",
    "availability": "https://schema.org/InStock",
    "price": "55.00",
    "priceCurrency": "USD"
  },
  "review": [
    {
      "@type": "Review",
      "author": "Ellie",
      "datePublished": "2011-04-01",
      "reviewBody": "The lamp burned out and now I have to replace it.",
      "name": "Not a happy camper",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "1",
        "worstRating": "1"
      }
    },
    {
      "@type": "Review",
      "author": "Lucas",
      "datePublished": "2011-03-25",
      "reviewBody": "Great microwave for the price. It is small and fits in my apartment.",
      "name": "Value purchase",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "4",
        "worstRating": "1"
      }
    }
  ]
 */
