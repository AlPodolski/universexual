<?php

namespace Database\Seeders;

use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\National;
use App\Models\Rayon;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $postsData = array();

        $i = 0;

        $price = array(1000, 1500, 2000, 3000, 5000, 10000);

        $national = National::get()->toArray();
        $hair = HairColor::get()->toArray();
        $intimHair = IntimHair::get()->toArray();
        $rayon = Rayon::get()->toArray();

        $photo = [
            'files/1c6b4dff067c04d654ebc.jpg',
            'files/shelli_13376.jpg',
            'files/shelli_13379.jpg',
            'files/shelli_13383.jpg',
        ];

        while ($i <= 600){

            $postsData[] = [
                'user_id' => rand(1,3),
                'name' => $name = $faker->name,
                'url' => \Str::slug($name.'-'.rand(1, 1000)),
                'phone' => $faker->phoneNumber,
                'price' => $price[array_rand($price)],
                'publication_status' => rand(0,1),
                'rost' => rand(150,180),
                'ves' => rand(50,80),
                'age' => rand(18,62),
                'city_id' => rand(1,2),
                'about' => $faker->realText(500),
                'breast' => rand(1,6),
                'shoe_size' => rand(36,46),
                'clothing_size' => rand(36,46),
                'contacts_per_hour' => rand(1,3),
                'not_younger' => rand(18,70),
                'national_id' => $national[array_rand($national)]['id'],
                'hair_color_id' => $hair[array_rand($hair)]['id'],
                'intim_hair_id' => $intimHair[array_rand($intimHair)]['id'],
                'rayon_id' => $rayon[array_rand($rayon)]['id'],
                'check_photo_status' => rand(0, 1),
                'avatar' => $photo[array_rand($photo)],
                'type' => rand(0,1)
            ];

            $i++;

        }

        \DB::table('posts')->insert($postsData);
    }
}
