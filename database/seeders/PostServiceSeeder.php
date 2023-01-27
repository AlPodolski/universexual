<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use DB;

class PostServiceSeeder extends Seeder
{
    public function run()
    {
        $posts = \App\Models\Post::get();
        $nationals = \App\Models\Service::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $i = 0;

            while($i < 15){

                $i++;

                $data[] = [
                    'service_id' => $nationals[array_rand($nationals)]->id,
                    'posts_id' => $post->id,
                    'sympathy' => rand(0,1),
                    'pay' => rand(0,1),
                    'city_id' => $post->city_id
                ];

            }

        }

        DB::table('post_services')->insert($data);
    }
}
