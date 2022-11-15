<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');
            $table->smallInteger('city_id');
            $table->tinyInteger('national_id')->unsigned()->index()->default(1);
            $table->tinyInteger('hair_color_id')->unsigned()->index()->default(1);
            $table->tinyInteger('intim_hair_id')->unsigned()->index()->default(1);
            $table->smallInteger('rayon_id')->unsigned()->index()->default(1);
            $table->string('name');
            $table->string('phone');
            $table->string('url');
            $table->string('avatar');
            $table->text('about');
            $table->smallInteger('price')->index()->unsigned();
            $table->tinyInteger('publication_status')->default(0);
            $table->tinyInteger('age')->default(0);
            $table->tinyInteger('rost')->default(0)->unsigned();
            $table->tinyInteger('ves')->default(0);
            $table->tinyInteger('breast')->default(0);
            $table->tinyInteger('shoe_size')->default(null);
            $table->tinyInteger('clothing_size')->default(null);
            $table->tinyInteger('contacts_per_hour')->default(1);
            $table->tinyInteger('not_younger')->unsigned()->default(18);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
