<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hair_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
        });

        $sql = "INSERT INTO `hair_colors` (`url`, `value`) VALUES
                ('blondinka', 'Блондинка'),
                ('brunetka', 'Брюнетка'),
                ('rysaya', 'Русая'),
                ('rijaya', 'Рыжая'),
                ('shatenka', 'Шатенка');";

        DB::statement($sql);
    }

    public function down()
    {
        Schema::dropIfExists('hair_colors');
    }
};
