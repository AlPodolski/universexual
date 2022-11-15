<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('post_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('posts_id')->unsigned();
            $table->smallInteger('service_id')->index()->unsigned();
            $table->smallInteger('city_id')->index()->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_services');
    }
};
