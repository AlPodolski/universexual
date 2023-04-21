<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Metro;
use App\Models\MetroNear;
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

        foreach ($data as $item) {

            $tmp = trim($item['osnova']);

            $osnMetro = Metro::where('value', $tmp)->first();

            if ($osnMetro) {

                $newMetroInfo = Metro::where(['value' => trim($item['sosed1']), 'city_id' => 1])->first();

                if ($newMetroInfo) {

                    $newMetro = new MetroNear();

                    $newMetro->metro_id = $osnMetro->id;
                    $newMetro->near_metro_id = $newMetroInfo->id;

                    $newMetro->save();

                }


                $newMetroInfo = Metro::where(['value' => trim($item['sosed2']), 'city_id' => 1])->first();

                if ($newMetroInfo) {

                    $newMetro = new MetroNear();

                    $newMetro->metro_id = $osnMetro->id;
                    $newMetro->near_metro_id = $newMetroInfo->id;

                    $newMetro->save();

                }

            }

        }

    }
}
