<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Post;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class CustCommand extends Command
{
    protected $signature = 'cust';

    protected $description = 'Command descripti on';

    public function handle()
    {
        $stream = \fopen(storage_path('city_kor.csv'), 'r');

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

        foreach ($data as $item){

            if ($city = City::where('city', $item['city'])->first()){

                $city->x = $item['x'];
                $city->y = $item['y'];

                $city->save();

            }

        }

    }
}
