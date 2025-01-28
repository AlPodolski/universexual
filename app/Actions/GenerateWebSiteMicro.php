<?php

namespace App\Actions;

use App\Models\City;

class GenerateWebSiteMicro
{

    public function generate(City $city)
    {

        $description = 'Сайт, где собраны все анкеты реальных проституток '.$city->city2.' с фото, ценами и номерами телефона';

        $site = "Рус Проститутки ".$city->city;

        $websiteSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "url" => "https://".$city->url.".".SITE,
            "name" => $site,
            "description" => $description,
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => $site."/?q={search_term_string}",
                "query-input" => "required name=search_term_string",
            ],
        ];

        $data = '<script type="application/ld+json">'.json_encode($websiteSchema).'</script>';

        return $data;

    }
}
