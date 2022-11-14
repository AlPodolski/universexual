<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('intim_hairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
            $table->string('value2')->nullable();
        });

        $sql = "
        INSERT INTO `intim_hairs` (`url`, `value`, `value2`) VALUES
                                ('polnaya-depilyaciya', 'с полной  депиляцией', NULL),
                                ('akkuratnaya-strizhka', 'с акуратной стрижкой', NULL),
                                ('naturalnaya', 'с натуральной растительностью', NULL);
        ";

        DB::statement($sql);
    }

    public function down()
    {
        Schema::dropIfExists('intim_hairs');
    }
};
