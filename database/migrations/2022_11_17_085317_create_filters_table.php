<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('related_table');
            $table->string('related_id');
            $table->string('related_column');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filters');
    }
};
