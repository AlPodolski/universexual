<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Metro;
use App\Models\Post;
use App\Models\PostMetro;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class CustCommand extends Command
{
    protected $signature = 'cust';

    protected $description = 'Command descripti on';

    public function handle()
    {
        $stream = \fopen(storage_path('soot_metro.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $data = array();

        foreach ($records as $value) {

            $data[] = $value;

        }

        $posts = Post::where(['city_id' => 1, 'site_id' => 1])->with('metro')->get();

        foreach ($posts as $post) {

            if ($post->metro->count() == 1) {

                foreach ($data as $item) {

                    $tmp = trim($item['osnova']);

                    if ($post->metro[0]->metro_value == $tmp) {


                        $newMetroInfo = Metro::where(['value' => trim($item['sosed1']), 'city_id' => 1])->first();

                        if ($newMetroInfo) {

                            $newMetro = new PostMetro();

                            $newMetro->city_id = 1;
                            $newMetro->posts_id = $post->id;
                            $newMetro->metros_id = $newMetroInfo->id;

                            $newMetro->save();

                        }


                        $newMetroInfo = Metro::where(['value' => trim($item['sosed2']), 'city_id' => 1])->first();

                        if ($newMetroInfo) {

                            $newMetro = new PostMetro();

                            $newMetro->city_id = 1;
                            $newMetro->posts_id = $post->id;
                            $newMetro->metros_id = $newMetroInfo->id;

                            $newMetro->save();

                        }


                    }

                }

            }

        }


    }
}
