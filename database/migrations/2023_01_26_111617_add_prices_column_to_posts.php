<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('apartament_2_hour_price')->nullable();
            $table->integer('apartament_night_price')->nullable();

            $table->integer('exit_1_hour_price')->nullable();
            $table->integer('exit_2_hour_price')->nullable();
            $table->integer('exit_night_price')->nullable();
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('apartament_2_hour_price')->nullable();
            $table->dropColumn('apartament_night_price')->nullable();

            $table->dropColumn('exit_1_hour_price')->nullable();
            $table->dropColumn('exit_2_hour_price')->nullable();
            $table->dropColumn('exit_night_price')->nullable();
        });
    }
};
