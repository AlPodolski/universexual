<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\Post;
use App\Models\PostPlace;
use Illuminate\Database\Seeder;

class PostPlaceSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();

        $place = Place::all()->toArray();

        foreach ($posts as $post){

            $postPlace = new PostPlace();

            $postPlace->place_id = $place[array_rand($place)]['id'];
            $postPlace->posts_id = $post->id;
            $postPlace->city_id = $post->city_id;

            $postPlace->save();

        }
    }
}
