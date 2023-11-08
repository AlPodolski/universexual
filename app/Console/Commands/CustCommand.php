<?php

namespace App\Console\Commands;

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
        $city = City::where('id', '>', 1)->get();

        $host = 'intim-boxx.com';

        $dataRepository = new DataRepository();

        foreach ($city as $item){

            $domain = 'https://'.$item->url.'.'.$host;

            $data = $this->prepareData($dataRepository->getData($item->id), $domain.'/');

            $requestData = array(
                'host' => $item->url.'.'.$host,
                'key' => 'UhfuXuDnsB8FlpOT9Fds5iaZLzYqQh86MfgsSlIQIFVZO3HN',
                'keyLocation' => $domain.'/UhfuXuDnsB8FlpOT9Fds5iaZLzYqQh86MfgsSlIQIFVZO3HN.txt',
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

            var_dump($server_output);

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
