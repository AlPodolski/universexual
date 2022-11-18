<?php

namespace Database\Seeders;

use App\Models\PostPlace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PostSeeder::class);
        $this->call(PostServiceSeeder::class);
        $this->call(PostMetroSeeder::class);
        $this->call(PostPlaceSeeder::class);
        $this->call(PostTimeSeeder::class);

        \Artisan::call('add:filter');
    }
}
