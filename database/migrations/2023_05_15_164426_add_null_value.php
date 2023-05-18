<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('url')->nullable()->change();
            $table->string('avatar')->nullable()->change();
            $table->tinyInteger('shoe_size')->nullable()->change();
            $table->tinyInteger('clothing_size')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {

        });
    }
};
