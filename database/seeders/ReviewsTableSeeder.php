<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Post; // Не забудь подключить модель, если есть

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Получаем все существующие ID из таблицы posts
        $postIds = DB::table('posts')->pluck('id')->toArray();

        if (empty($postIds)) {
            $this->command->info('Нет доступных постов для отзывов.');
            return;
        }

        foreach (range(1, 10000) as $i) {
            DB::table('reviews')->insert([
                'posts_id'   => $faker->randomElement($postIds),
                'name'       => $faker->firstName,
                'text'       => $faker->realText(200),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => Carbon::now(),
                'rating'     => rand(1, 10),
                'status'     => rand(0, 1),
                'clean'      => rand(0, 10),
                'is_happy'   => rand(0, 1),
            ]);
        }
    }
}
