<?php

namespace App\Actions;

class AddToCloud
{
    public function add($ip, $zone, $city, $api, $email)
    {
        $content = array(
            'type' => "A",
            'name' => $city,
            'content' => $ip,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/".$zone."/dns_records");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = [
            'X-Auth-Email: ' . $email,
            'X-Auth-Key: ' . $api,
            'Content-Type: application/json',
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec($ch);

        $object = json_decode($server_output);

        if (isset($object->result->id)){

            $zapid = $object->result->id;


            curl_close($ch);

            // пытаемся поставить галочку на облаке
            $zoneindetif = "https://api.cloudflare.com/client/v4/zones/".$zone."/dns_records/$zapid";


            $content = array(
                'type' => "A",
                'name' => $city,
                'content' => $ip,
                'proxied' => true,
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $zoneindetif);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            $result = json_decode($result);

        }

        if (!$object->success) session(['msg' => 'Днс не добавлен']);

    }
}
