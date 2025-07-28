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

        $files = [
            '2jfy7rx9yE5-2_9n.jpg',
            'lDSTWecRINpQju4w.jpg',
            'n4vmO7eefIVqCdSk.jpg',
            'q0fnNTDj_nUUETFa.jpg',
            'VvaKLQAy8kYebfNX.jpg',
            'Y4SlAzhM8QnITLpE.jpg',
            'yE_eUWWla77WQQ-W.jpg',
        ];

        $posts = Post::all();

        foreach ($posts as $post) {
            $post->avatar = '/aaa/'. $randomFile = $files[array_rand($files)];
            $post->save();
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
