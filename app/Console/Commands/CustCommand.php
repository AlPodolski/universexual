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
        $posts = Post::all();

        foreach ($posts as $post){

            $post->apartament_2_hour_price = $post->price * 2;
            if (!$post->apartament_night_price) $post->apartament_night_price = $post->price * 5;
            if (!$post->exit_1_hour_price) $post->exit_1_hour_price = $post->price + 1000;
            if (!$post->exit_2_hour_price) $post->exit_2_hour_price = $post->exit_1_hour_price * 2;
            if (!$post->exit_night_price) $post->exit_night_price = $post->exit_1_hour_price * 5;

            $post->save();

        }
    }
}
