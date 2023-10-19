<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('chat_messages', function (Blueprint $table) {

            $table->string('message')->nullable()->change();
            $table->integer('related_id')->nullable();
            $table->string('related_class')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->string('message')->change();
            $table->dropColumn('related_id');
            $table->dropColumn('related_class');
        });
    }
};
