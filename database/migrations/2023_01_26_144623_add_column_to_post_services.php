<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('post_services', function (Blueprint $table) {
            $table->boolean('sympathy')->default(false);
            $table->boolean('pay')->default(false);
        });
    }

    public function down()
    {
        Schema::table('post_services', function (Blueprint $table) {
            $table->dropColumn('sympathy');
            $table->dropColumn('pay');
        });
    }
};
