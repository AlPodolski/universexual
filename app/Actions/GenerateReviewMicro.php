<?php

namespace App\Actions;

use App\Models\Review;

class GenerateReviewMicro
{
    public function generate(Review $review, $name)
    {
        $review = [
            "@context" => "https://schema.org",
            "@type" => "Review",
            "author" => [
                "@type" => "Person",
                "name" => $review->name
            ],
            "datePublished" => $review->created_at,
            "reviewBody" => $review->text,
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => $review->rating,
                "bestRating" => "5"
            ],
            "itemReviewed" => [
                "@type" => "Person",
                "name" => $name
            ]
        ];

        $review = json_encode($review);

        return '<script type="application/ld+json">' . $review . '</script>';

    }
}
