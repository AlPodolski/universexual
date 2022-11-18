<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
        });

        $sql = "INSERT INTO `times` (`url`, `value`) VALUES
                ('na-chas', 'На час'),
                ('na-noch', 'На ночь');";

        DB::statement($sql);
    }

    public function down()
    {
        Schema::dropIfExists('times');
    }
};
