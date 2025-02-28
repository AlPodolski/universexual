<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('city_id')->index();
            $table->string('title');
            $table->string('description');
            $table->string('h1');
            $table->text('text');
            $table->text('small_text');
            $table->string('image');
            $table->string('url')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
