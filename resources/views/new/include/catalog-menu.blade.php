<div class="catalog" id="catalogPanel">
    <button class="close-btn" id="catalogClose">&times;</button>
    <p class="catalog-heading">Каталог</p>
    <div class="accordion">
        @php
            $categories = [
                'metro' => 'Метро',
                'rayon' => 'Район',
                'national' => 'Национальность', // Assuming a more appropriate title based on context
                'place' => 'Место встречи',
                'time' => 'Время встречи',
                'hair' => 'Цвет волос',
                'intimHair' => 'Интимная стрижка',
                'service' => 'Услуги',
            ];
        @endphp

        <a class="sidebar-link" href="/vyezd">Выезд</a>
        <a class="sidebar-link" href="/novye-prostitutki">Новые проститутки</a>
        <a class="sidebar-link" href="/individualki-s-video">Индивидуалки с видео</a>
        <a class="sidebar-link" href="/zrelye-prostitutki">Зрелые проститутки</a>
        <a class="sidebar-link" href="/elitnye-prostitutki">Элитные проститутки</a>
        <a class="sidebar-link" href="/molodye-prostitutki">Молодые проститутки</a>
        <a class="sidebar-link" href="/tolstye-prostitutki">Толстые проститутки</a>
        <a class="sidebar-link" href="/deshevye-prostitutki">Дешевые</a>
        <a class="sidebar-link" href="/proverennye-prostitutki">Проверенные проститутки</a>

        @foreach($categories as $key => $title)
            @if(isset($data[$key]) && $data[$key]->first())
                <div class="accordion-item">
                    <div class="accordion-header">{{ $title }}</div>
                    <div class="accordion-content">
                        <ul>
                            @foreach($data[$key] as $item)
                                <li><a href="/{{ $item->filter_url }}">{{ $item->value }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
