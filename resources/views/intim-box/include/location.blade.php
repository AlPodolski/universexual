<div class="header__location header__col">
    <ul class="header__location-list">
        <li class="header__location-list__item city-location">
            <svg class="header__location-icon">
                <use xlink:href='/svg/dest/stack/sprite.svg#map'></use>
            </svg>
            <div class="header__location-text" onclick="close_city_list()">
                {{ $data['current_city']->city }}
            </div>
            <svg class="header__location-arrow">
                <use xlink:href='/svg/dest/stack/sprite.svg#arrow-down'></use>
            </svg>
            <ul class="header__location-list__sub_city header__location-list__sub_city">

                <li class="city-search">
                    <input type="text" class="city-search-input" placeholder="Поиск города">
                </li>

                <li class="position-absolute close-city_list" onclick="close_city_list()">
                    <img src="/img/close.svg" alt="">
                </li>

                <li class="city-list">

                    <ul>
                        @foreach($data['city_list'] as $item)
                            <li class="header__location-list__sub-item">
                                <a href="https://{{ $item->url }}.{{ SITE }}"
                                   class="header__location-list__sub-link link-reset">
                                    {{ $item->city }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </li>


            </ul>
        </li>

        @if($data['metro']->first())

            <li class="header__location-list__item">
                <svg class="header__location-icon">
                    <use xlink:href='/svg/dest/stack/sprite.svg#metro'></use>
                </svg>
                <div class="header__location-text">
                    Метро
                </div>
                <svg class="header__location-arrow">
                    <use xlink:href='/svg/dest/stack/sprite.svg#arrow-down'></use>
                </svg>
                <ul class="header__location-list__sub">

                    @foreach($data['metro'] as $item)

                        <li class="header__location-list__sub-item">
                            <a href="/{{ $item->filter_url }}" class="header__location-list__sub-link link-reset">
                                {{ $item->value }}
                            </a>
                        </li>

                    @endforeach

                </ul>
            </li>

        @endif
    </ul>
    <div class="header__location-city">
    </div>
    @if (!isset($_COOKIE['city']))
        <div class="check_city_block position-absolute">
            <div class="rec"></div>
            <div class="you_city">Ваш город {{ $data['current_city']->city }}?</div>
            <div class="city-btn-wrap">
                <div class="verno-btn" onclick="close_city_check()">Все верно</div>
                <div class="ne-verno-btn" onclick="open_city_select()">Сменить город</div>
            </div>
        </div>
    @endif
</div>
