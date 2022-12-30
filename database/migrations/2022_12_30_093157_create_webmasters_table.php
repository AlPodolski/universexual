<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('webmasters', function (Blueprint $table) {
            $table->id();

            $table->string('url')->index();
            $table->string('tag');

        });
    }

    public function down()
    {
        Schema::dropIfExists('webmasters');
    }
};
