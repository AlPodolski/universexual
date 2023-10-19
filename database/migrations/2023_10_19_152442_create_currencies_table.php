<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        $sql = "INSERT INTO `currencies` (`id`, `name`, `value`) VALUES
                (2, 'КАРТА', 'visamaster.rur'),
                (3, 'ЮМАНИ', 'yandex'),
                (4, 'QIWI', 'qiwi'),
                (5, 'СБП', 'sbp.rub');";

        DB::statement($sql);

    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
