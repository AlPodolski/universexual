<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('post_places', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('place_id')->unsigned();
            $table->bigInteger('posts_id')->unsigned();
            $table->smallInteger('city_id')->unsigned();

        });
    }

    public function down()
    {
        Schema::dropIfExists('post_places');
    }
};
