<?php

namespace App\Console\Commands;

use App\Models\ActualCityInfo;
use App\Models\City;
use App\Models\Metro;
use App\Models\MetroNear;
use App\Models\Post;
use App\Models\PostMetro;
use App\Repository\DataRepository;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class CustCommand extends Command
{
    protected $signature = 'cust';

    protected $description = 'Command descripti on';

    public function handle()
    {
        $cloudflareEmail = 'aprutic@gmail.com';
        $cloudflareApiKey = 'f716ab864dd1d40dab325c43b64e185bfd517';
        $newIp = '	149.248.79.169'; // новый IP
        $domains = [
            'intim-dosugl.com',
            'intim-dosugl.online',
            'intimserch.com',
            'porzitutki.com',
            'prostitutkiagents.site',
            'prostitutkiland.com',
            'prostitutkinews.com',
            'sex-price.store',
            'sex-prices.online',
            'sex-rus.com',
            'sexi-dom.com',
            'sexidom.online',
            'sexinteam.com',
            'sexxxyi.com',
        ];

// Функция запроса к API
        function cloudflareApiRequest($method, $endpoint, $headers, $data = null)
        {
            $ch = curl_init("https://api.cloudflare.com/client/v4/$endpoint");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            $response = curl_exec($ch);
            curl_close($ch);
            return json_decode($response, true);
        }

        $headers = [
            "X-Auth-Email: $cloudflareEmail",
            "X-Auth-Key: $cloudflareApiKey",
            "Content-Type: application/json"
        ];

        foreach ($domains as $domain) {
            // Получаем Zone ID
            $zoneResp = cloudflareApiRequest('GET', "zones?name=$domain", $headers);
            if (empty($zoneResp['result'][0]['id'])) {
                echo "Zone not found for $domain\n";
                continue;
            }
            $zoneId = $zoneResp['result'][0]['id'];

            // Получаем DNS-записи
            $dnsRecords = cloudflareApiRequest('GET', "zones/$zoneId/dns_records", $headers);
            if (empty($dnsRecords['result'])) {
                echo "No DNS records found for $domain\n";
                continue;
            }

            foreach ($dnsRecords['result'] as $record) {
                // Обрабатываем только A-записи
                if ($record['type'] === 'A') {
                    $recordId = $record['id'];
                    $recordName = $record['name'];

                    $updateData = [
                        'type' => 'A',
                        'name' => $recordName,
                        'content' => $newIp,
                        'ttl' => 1,
                        'proxied' => false
                    ];

                    $updateResp = cloudflareApiRequest('PUT', "zones/$zoneId/dns_records/$recordId", $headers, $updateData);
                    if ($updateResp['success']) {
                        echo "Updated $recordName to $newIp and disabled proxying\n";
                    } else {
                        echo "Failed to update $recordName\n";
                    }
                }
            }
        }

        exit();


        $city = City::with('info')
            ->get();

        $dataRepository = new DataRepository();

        foreach ($city as $item){

            $domain = $item->url.'.prostitutkirus.com';

            $data = $this->prepareData($dataRepository->getData($item->id), 'https://'.$domain.'/');

            $requestData = array(
                'host' => $domain,
                'key' => 'vcwP8KHhgk0DOShDlWPq',
                'keyLocation' => 'https://'.$domain.'/vcwP8KHhgk0DOShDlWPq.txt',
                'urlList' => $data,
            );

            $content = json_encode($requestData);

            $length = strlen($content);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://yandex.com/indexnow');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS,  $content);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = [
                'Content-Type: application/json',
                'Content-Length: '.$length
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($ch);

            echo $domain.PHP_EOL;

            var_dump($server_output);

            exit();


        }

    }

    private function prepareData($data, $host){

        $result = array();

        if ($data['metro']){

            foreach ($data['metro'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['rayon']){

            foreach ($data['rayon'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['national']){

            foreach ($data['national'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['place']){

            foreach ($data['place'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['time']){

            foreach ($data['time'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['hair']){

            foreach ($data['hair'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['intimHair']){

            foreach ($data['intimHair'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        if ($data['service']){

            foreach ($data['service'] as $item){

                $result[] = $host.$item->filter_url;

            }

        }

        return $result;

    }
}
