<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTime;
use App\Models\Time;
use Illuminate\Database\Seeder;

class PostTimeSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();

        $place = Time::all()->toArray();

        foreach ($posts as $post){

            $postPlace = new PostTime();

            $postPlace->times_id = $place[array_rand($place)]['id'];
            $postPlace->posts_id = $post->id;
            $postPlace->city_id = $post->city_id;

            $postPlace->save();

        }
    }
}
