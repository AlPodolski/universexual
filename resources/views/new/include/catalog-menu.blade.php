<div class="catalog" id="catalogPanel">
    <button class="close-btn" id="catalogClose">&times;</button>
    <h3>Каталог</h3>
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

        <a class="sidebar-link" href="/prostitutki-na-vyezd">Выезд</a>
        <a class="sidebar-link" href="/intim-karta-prostitutok">Интим карта</a>
        <a class="sidebar-link" href="/zrelye-prostitutki">Зрелые</a>
        <a class="sidebar-link" href="/elitnye-prostitutki">Элитные</a>
        <a class="sidebar-link" href="/deshevye-prostitutki">Дешевые</a>
        <a class="sidebar-link" href="/proverennye-prostitutki">Проверенные</a>

        @foreach($categories as $key => $title)
            @if(isset($data[$key]) && $data[$key]->first())
                <div class="accordion-item">
                    <div class="accordion-header">{{ $title }}</div>
                    <div class="accordion-content">
                        <ul>
                            @foreach($data[$key] as $item)
                                <li><a href="/{{ $item->url }}">{{ $item->value }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
