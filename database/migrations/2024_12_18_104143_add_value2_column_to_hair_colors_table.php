<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('hair_colors', function (Blueprint $table) {
            $table->string('value2')->default(null);
        });
    }

    public function down(): void
    {
        Schema::table('hair_colors', function (Blueprint $table) {
            $table->dropColumn('value2');
        });
    }
};
