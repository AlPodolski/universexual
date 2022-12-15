<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('posts_id');
            $table->string('email');
            $table->text('text');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
