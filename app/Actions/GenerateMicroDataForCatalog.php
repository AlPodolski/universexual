<?php

namespace App\Actions;

use Cache;
use Carbon\Carbon;

class GenerateMicroDataForCatalog
{
    public function generate($title, $posts, $url, $cityId)
    {

        $expire = Carbon::now()->addMinutes(1000);

        $data = Cache::remember('rating_'.$url.'_'.$cityId, $expire, function () use ($title, $posts) {

            $minPrice = $this->getMinPrice($posts);
            if (!$minPrice) return false;
            $maxPrice = $this->getMaxPrice($posts);

            $rating = $this->getRandRating();
            $reviewCount = rand(50, 100);

            return [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => $title,
                'offers' => [
                    '@type' => 'AggregateOffer',
                    'highPrice' => $maxPrice,
                    'lowPrice' => $minPrice,
                    'priceCurrency' => 'RUB',
                ],
                'aggregateRating' => [
                    '@type' => 'AggregateRating',
                    'ratingValue' => $rating,
                    'worstRating' => 1,
                    'bestRating' => 5,
                    'reviewCount' => $reviewCount
                ],

            ];

        });

        $data = '<script type="application/ld+json">'.json_encode($data).'</script>';

        return $data;

    }

    private function getRandRating(){

        $firstData = rand(4,5);

        if ($firstData != 5) return $firstData. rand(0, 9);

        return $firstData;

    }

    private function getMinPrice( $posts){

        if (!isset($posts->first()->price)) return false;

        $price = $posts->first()->price;

        foreach($posts as $post){

            if ($price < $post->price ) $price = $post->price;

        }

        return $price;

    }

    private function getMaxPrice( $posts){

        $price = $posts->first()->price;

        foreach($posts as $post){

            if ($price > $post->price ) $price = $post->price;

        }

        return $price;

    }

}
