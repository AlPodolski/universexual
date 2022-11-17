<?php

namespace App\Console\Commands;

use App\Models\Filter;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Rayon;
use App\Models\Service;
use App\Services\FilterUrlService;
use Illuminate\Console\Command;

class AddFilterCommand extends Command
{
    protected $signature = 'add:filter';

    protected $description = 'Command description';

    public function handle(FilterUrlService $filterUrlService)
    {

        $service = Service::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'post_services';
            $filter->related_id = $item->id;
            $filter->related_column = 'service_id';

            $filter->save();

        }

        $service = Metro::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'post_metros';
            $filter->related_id = $item->id;
            $filter->related_column = 'metros_id';

            $filter->save();

        }

        $service = Rayon::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'rayons';
            $filter->related_id = $item->id;
            $filter->related_column = 'rayon_id';

            $filter->save();

        }

        $service = National::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'nationals';
            $filter->related_id = $item->id;
            $filter->related_column = 'national_id';

            $filter->save();

        }

        $service = HairColor::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'hair_color';
            $filter->related_id = $item->id;
            $filter->related_column = 'hair_color_id';

            $filter->save();

        }

        $service = IntimHair::all();

        foreach ($service as $item){

            $filter = new Filter();

            $filter->url = $filterUrlService->makeUrlForFilterTable($item->value);
            $filter->related_table = 'intim_hair';
            $filter->related_id = $item->id;
            $filter->related_column = 'intim_hair_id';

            $filter->save();

        }
    }
}
