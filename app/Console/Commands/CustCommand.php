<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class CustCommand extends Command
{
    protected $signature = 'cust';

    protected $description = 'Command descripti on';

    public function handle()
    {
        $posts = Post::get();

        foreach ($posts as $post){

            $post->url = \Str::slug($post->name.'-'.$post->id);

            $post->save();

        }

    }
}
