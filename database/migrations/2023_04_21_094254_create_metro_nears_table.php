<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('metro_nears', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('metro_id');
            $table->smallInteger('near_metro_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('metro_nears');
    }
};
