<?php

namespace App\Actions;

use App\Models\Redirect;

class GenerateServiceMicro
{
    public function generate($site, $meta, $cityInfo)
    {
        $service = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "name" => $meta['h1'],
            "description" => $meta['des'],
            "provider" => [
                "@type" => "Organization",
                "name" => "Индивидуалки ".$cityInfo['city2'],
                "url" => $site,
            ],
            "areaServed" => [
                "@type" => "Place",
                "name" => $cityInfo['city']
            ],
            "serviceType" => "Эскорт-услуги, отдых, сопровождение"
        ];

        $result = json_encode($service);

        return '<script type="application/ld+json">' . $result . '</script>';

    }

}
