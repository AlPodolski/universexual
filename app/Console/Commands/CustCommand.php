<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Metro;
use App\Models\MetroNear;
use App\Models\Post;
use App\Models\PostMetro;
use App\Models\Text;
use App\Repository\DataRepository;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;
use GuzzleHttp\Client;

class CustCommand extends Command
{
    protected $signature = 'cust';

    protected $description = 'Command descripti on';

    protected $client;
    protected $apiKey;

    public function handle()
    {

        $this->apiKey = env('OPENAI_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        $url = '/';

        $cityList = City::where('id', '>', 1)->get();

        $model = 'gpt-3.5-turbo';

        $maxTokens = 3000;

        foreach ($cityList as $item){

            $prompt = 'Написать уникальный текст, использовать ключи:
        проститутки '.$item->city2.' , снять индивидуалку '.$item->city3.', заказать проститутку '.$item->city.'.
        каждый Ключ в тексте должен быть только один раз. используй хтмл для разметки текста без тега боди. объемом минимум 3000
        символов';

            $response = $this->client->post('chat/completions', [
                'json' => [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'max_tokens' => $maxTokens,
                ],
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            $result = ($body['choices'][0]['message']['content'] ?? false);

            if ($result){

                $result = preg_replace('/[\x00-\x1F\x7F]/u', '', $result);

                $text = new Text();

                $text->city_id = $item->id;
                $text->page_url = $url;
                $text->text = $result;

                $text->save();

            }

            echo  $item->url . ' - ' . $item->id . ' - ' . $url .PHP_EOL;

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
