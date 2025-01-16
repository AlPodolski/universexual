<?php

namespace App\Console\Commands;

use App\Jobs\CreatePostTextAbout;
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
        $posts = Post::all();

        foreach ($posts as $post){

            CreatePostTextAbout::dispatch($post);

        }

    }

    private function prepareData($data, $host)
    {

        $result = array();

        if ($data['metro']) {

            foreach ($data['metro'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['rayon']) {

            foreach ($data['rayon'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['national']) {

            foreach ($data['national'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['place']) {

            foreach ($data['place'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['time']) {

            foreach ($data['time'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['hair']) {

            foreach ($data['hair'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['intimHair']) {

            foreach ($data['intimHair'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        if ($data['service']) {

            foreach ($data['service'] as $item) {

                $result[] = $host . $item->filter_url;

            }

        }

        return $result;

    }
}
