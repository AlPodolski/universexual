<div class="side-menu" id="side-menu">
    <div id="close-btn" class="close-side-btn" onclick="closePaneMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </div>
    <nav>
        <ul class="side-menu-list">

            <li><a href="/" class="side-menu-link">Главная</a></li>
            <li><a href="/individualki-deshevye" class="side-menu-link">Дешевые</a></li>
            <li><a href="/individualki-proverennye" class="side-menu-link">Проверенные</a></li>
            <li><a href="/individualki-vip" class="side-menu-link">VIP</a></li>
            <li><a href="/individualki-s-video" class="side-menu-link">С видео</a></li>
            <li><a href="/individualki-novye" class="side-menu-link">Новые</a></li>
            <li><a href="/zrelye-individualki" class="side-menu-link">Зрелые</a></li>
            <li><a href="/molodye-individualki" class="side-menu-link">Молодые</a></li>
            <li><a href="/tolstye-individualki" class="side-menu-link">Толстые</a></li>

            @if($data['metro']->first())
                <li>
                    <a class="side-menu-link" data-bs-toggle="collapse"
                       href="#collapseMetro"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseMetro">
                        Метро
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="collapse" id="collapseMetro">
                        <ul class="list-unstyled ps-3">
                            @foreach($data['metro'] as $item)
                                @php
                                    /* @var $item \App\Models\Metro */
                                @endphp
                                <li>
                                    <a itemprop="url"
                                       title="Проститутки у метро {{ $item->value }} {{ $data['current_city']->city3 }}"
                                       href="/{{ $item->filter_url }}"
                                       class="side-menu-link">
                                        <span itemprop="name">{{ $item->value }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif

            @if($data['rayon']->first())
                <li>
                    <a class="side-menu-link" data-bs-toggle="collapse"
                       href="#collapseService"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseService">
                        Район
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="collapse" id="collapseService">
                        <ul class="list-unstyled ps-3">
                            @foreach($data['rayon'] as $item)
                                @php
                                    /* @var $item \App\Models\Rayon */
                                @endphp
                                <li>
                                    <a itemprop="url"
                                       title="Проститутки районе {{ $item->value }} {{ $data['current_city']->city3 }}"
                                       href="/{{ $item->filter_url }}"
                                       class="side-menu-link">
                                        <span itemprop="name">{{ $item->value }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapseService"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseService">
                    Услуги
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapseService">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['service'] as $item)
                            @php
                                /* @var $item \App\Models\Service */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки c услугой {{ $item->value }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapseNational"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseNational">
                    Национальность
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapseNational">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['national'] as $item)
                            @php
                                /* @var $item \App\Models\National */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки {{ $item->value2 }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapsePlace"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapsePlace">
                    Место встречи
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapsePlace">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['place'] as $item)
                            @php
                                /* @var $item \App\Models\Place */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки {{ $item->value2 }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapseTime"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseTime">
                    Время встречи
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapseTime">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['time'] as $item)
                            @php
                                /* @var $item \App\Models\Place */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки {{ $item->value }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapseHair"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseHair">
                    Цвет волос
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapseHair">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['hair'] as $item)
                            @php
                                /* @var $item \App\Models\HairColor */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки {{ $item->value2 }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li>
                <a class="side-menu-link" data-bs-toggle="collapse"
                   href="#collapseIntimHair"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseIntimHair">
                    Интимная стрижка
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <div class="collapse" id="collapseIntimHair">
                    <ul class="list-unstyled ps-3">
                        @foreach($data['intimHair'] as $item)
                            @php
                                /* @var $item \App\Models\IntimHair */
                            @endphp
                            <li>
                                <a itemprop="url"
                                   title="Проститутки {{ $item->value2 }} {{ $data['current_city']->city3 }}"
                                   href="/{{ $item->filter_url }}"
                                   class="side-menu-link">
                                    <span itemprop="name">{{ $item->value }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

        </ul>
    </nav>
</div>
