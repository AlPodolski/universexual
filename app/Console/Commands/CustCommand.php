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

            $post->express = $post->price / 2;
            $post->save();

        }
    }
}
