<!-- Sidebar -->
<aside class="sidebar" id="catalogPanel">
    <div class="close-wrap" id="catalogClose">
        <svg xmlns="http://www.w3.org/2000/svg"
             width="24" height="24" viewBox="0 0 24 24"
             aria-hidden="true">
            <path d="M6 6 L18 18 M6 18 L18 6"
                  fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="sidebar-section">
        <ul class="sidebar-menu">
            <li>
                <a href="#">
                    <span class="menu-icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="9.5" cy="9.5" r="8.5" stroke="white" stroke-width="2"/>
  <polygon points="7,5.8 13,9.5 7,13.2" fill="white"/>
</svg>
                    </span>С видео
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="menu-icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 10L12 3L21 10V20C21 20.55 20.55 21 20 21H15C14.45 21 14 20.55 14 20V15H10V20C10 20.55 9.55 21 9 21H4C3.45 21 3 20.55 3 20V10Z"/>
</svg>
                    </span>Интим-салоны
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="menu-icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 6L9 4L15 6L21 4V18L15 20L9 18L3 20V6Z" fill="white"/>
  <path d="M9 4V18" stroke="white" stroke-width="1.5"/>
  <path d="M15 6V20" stroke="white" stroke-width="1.5"/>
</svg>
                    </span>Интим-карты
                </a>
            </li>
        </ul>
    </div>

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

    <div class="accordion-wrapper sidebar-section">
        @foreach($categories as $key => $title)
            @if(isset($data[$key]) && $data[$key]->first())
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        {{ $title }}
                        <span class="accordion-arrow">▼</span>
                    </button>
                    <div class="accordion-body">
                        <ul class="sidebar-menu">
                            @foreach($data[$key] as $item)
                                <li><a href="/{{ $item->filter_url }}">{{ $item->value }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</aside>

@if(false)
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

            <a class="sidebar-link" href="/na-vyezd">Выезд</a>
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
@endif
