<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->text('title');
            $table->text('des');
            $table->text('h1');
        });

        DB::statement("
INSERT INTO `metas` (`id`, `url`, `title`, `des`, `h1`) VALUES
(1, '/', 'Реальные проститутки :city2 Все  индивидуалки :city2 собраны тут', 'Надоели  разводы на деньги   и толпы иммигранток  из средней  Азии тогда заходи только здесь тебя  ждет полный список  проституток :city2 с отзывами и  обзорами  от уважаемых клиентов.', 'Проститутки :city2'),
(2, 'default', '[:cena] проститутки [:price] [:age] [:time] [:place] [:intimhair] [:color] [:national2] [ у метро :metro] [ в районе :rayon] [с услугой :service2] :city3 ', 'Здесь собраны [:cena] проститутки [:price] [:age] [:place] [:intimhair] [:color] [:national2] [которые находятся рядом с :metro] [которые находятся в районе :rayon]  [с услугой :service2]  :city3 , анкеты индивидуалок, номера телефонов и честные отзывы', '[:cena] проститутки [:price] [:age] [:time] [:place] [:national2] [:intimhair] [:color] [ у метро :metro] [ в районе :rayon] [с услугой :service2] ');
");

    }

    public function down()
    {
        Schema::dropIfExists('meta');
    }
};
