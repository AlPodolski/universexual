<div class="sidebar" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <meta itemprop="name" content="Каталог">
    <div class="sidebar__header">
        <svg class="sidebar__header-burger">
            <use xlink:href="/svg/dest/stack/sprite.svg#burger"></use>
        </svg>
        <div class="sidebar__header-text">
            Каталог
        </div>
        <svg class="sidebar__header-arrow">
            <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
        </svg>
    </div>
    <div class="sidebar__types">
        <ul class="sidebar__types-list">
            <li class="sidebar__types-item">
                <a title="Анкеты проституток с видео" itemprop="url" href="/video" class="sidebar__types-link link-reset link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#video"></use>
                    </svg>
                    <span itemprop="name">С видео</span>
                </a>
            </li>
            <li class="sidebar__types-item">
                <a itemprop="url" title="Интим-салоны {{ $data['current_city']->city }}" href="/intim-salony" class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#home-location"></use>
                    </svg>
                    <span itemprop="name">Интим-салоны</span>
                </a>
            </li>
            <li class="sidebar__types-item">
                <a itemprop="url"
                   title="Проститутки массажистки"
                   href="/eroticeskii-massaz"
                   class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#massage"></use>
                    </svg>
                    <span itemprop="name">Массажистки</span>
                </a>
            </li>
            <li class="sidebar__types-item">
                <a itemprop="url"
                   title="Проститутки с расположением на карте"
                   href="/intim-karta"
                   class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#location"></use>
                    </svg>
                    <span itemprop="name">Интим-карта</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar__filters sidebar-filters">
        <ul class="sidebar-filters__list">
            <!-- tabindex нужны для навигации клавиатурой, также отвечают за табы на мобильной версии -->
            <li class="sidebar-filters__item" tabindex="0">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text" onclick="openMenu(this)">
                        Цена
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">

                    <div class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Дорогие проститутки"
                           href="/dorogie-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Дорогие проститутки</span>
                        </a>
                    </div>

                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Дешевые проститутки"
                           href="/deshevye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Дешевые проститутки</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="1">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Национальность
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list ul-columns">

                    @foreach($data['national'] as $item)
                        @php
                            /* @var $item \App\Models\National */
                        @endphp
                        <li class="sidebar-filters-sub__item">
                            <a itemprop="url"
                               title="Проститутки {{ $item->value2 }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-filters-sub__link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="2">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Возраст
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Молодые проститутки"
                           href="/molodye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Молодые проститутки</span>
                        </a>
                    </li>

                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Молодые проститутки"
                           href="/vzroslye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Взрослые проститутки</span>
                        </a>
                    </li>

                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Старые проститутки"
                           href="/starye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Старые проститутки</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="3">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Рост
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Высокие проститутки"
                           href="/visokie" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Высокие</span>
                        </a>
                    </li>
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Низкие проститутки"
                           href="/nizkie"
                           class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Низкие</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="4">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Вес
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/tolstye"
                           title="Толстые проститутки"
                           class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Толстые</span>
                        </a>
                    </li>
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url"
                           title="Худые проститутки"
                           href="/hudye"
                           class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Худые</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="5">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Цвет волос
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">
                    @foreach($data['hair'] as $item)
                        @php
                            /* @var $item \App\Models\HairColor */
                        @endphp
                        <li class="sidebar-filters-sub__item">
                            <a itemprop="url"
                               title="Проститутки {{ $item->value2 }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-filters-sub__link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <div class="sidebar__tags sidebar-tags">
        <div class="sidebar-tags__text">
            Услуги:
        </div>
        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#sex"></use>
                </svg>
                Секс
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">

                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'sex')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>

        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#drop"></use>
                </svg>
                Окончание
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'cum')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon" width="13" id="dick" height="25" viewBox="0 0 13 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.80943 5.51976C2.83849 5.5663 2.86755 5.61284 2.90042 5.65729C2.90976 5.67338 2.92084 5.68826 2.93346 5.70192C2.99643 5.7834 3.06529 5.86021 3.13967 5.93166C3.15143 5.94325 3.16423 5.9538 3.17634 5.96504C3.24173 6.02594 3.31041 6.08303 3.3822 6.13631C3.80066 6.44613 4.3122 6.60476 4.83273 6.58572C5.35309 6.56686 5.85184 6.37156 6.24677 6.03197C6.39244 5.90603 6.60833 5.90603 6.75398 6.03197C7.14667 6.3693 7.64142 6.56428 8.1585 6.58536C8.67558 6.60647 9.18469 6.45268 9.60368 6.14873C9.68879 6.08646 9.76992 6.01899 9.84673 5.94668L9.85105 5.9427C9.92959 5.86849 10.0019 5.78787 10.0673 5.7019C10.0775 5.68996 10.0877 5.67629 10.0979 5.6628C10.1034 5.65502 10.1073 5.64896 10.1124 5.64152C10.1394 5.60174 10.1656 5.56091 10.1913 5.51974L10.1934 5.51559C10.4899 4.99142 10.5119 4.35552 10.2524 3.81214C9.72787 2.66607 8.31214 -0.000244141 6.50037 -0.000244141C4.80937 -0.000244141 3.4637 2.32183 2.86549 3.56338C2.82466 3.64832 2.78591 3.73136 2.74941 3.81076C2.72883 3.85522 2.71326 3.90089 2.6963 3.94604V3.94621C2.51345 4.41657 2.53179 4.94144 2.74733 5.39794C2.7674 5.43877 2.78608 5.48029 2.80944 5.51973L2.80943 5.51976ZM3.45259 4.13446C3.78006 3.41947 4.86902 1.23791 6.11283 0.838809V1.54982C6.11283 1.7638 6.28634 1.93732 6.50033 1.93732C6.71432 1.93732 6.88783 1.7638 6.88783 1.54982V0.838809C8.13164 1.2379 9.22063 3.41947 9.54808 4.13446C9.70221 4.44844 9.69356 4.81797 9.52472 5.12447C9.50725 5.15353 9.48787 5.1826 9.4666 5.21166C9.46469 5.21356 9.46279 5.21547 9.46279 5.21754C9.19206 5.5694 8.78119 5.78582 8.33785 5.81004C7.89446 5.83426 7.46267 5.66386 7.15528 5.34349C6.98524 5.16289 6.74824 5.06048 6.50034 5.06048C6.25245 5.06048 6.01546 5.16289 5.8454 5.34349C5.538 5.66387 5.10623 5.83426 4.66284 5.81004C4.21945 5.78582 3.80861 5.56941 3.53789 5.21754C3.53789 5.21564 3.53599 5.21374 3.53409 5.21166C3.51298 5.18381 3.49344 5.15474 3.47596 5.12447C3.30712 4.81793 3.29847 4.4484 3.45261 4.13446H3.45259Z" fill="#4926E8"/>
                    <path d="M5.76411 24.5033C4.98601 23.7785 4.544 22.7632 4.54351 21.6998C4.54351 21.4858 4.71702 21.3123 4.93101 21.3123C5.145 21.3123 5.31851 21.4858 5.31851 21.6998C5.32093 22.6696 5.78041 23.5814 6.55851 24.1604C7.21828 24.579 7.98398 24.8008 8.76536 24.7998C8.79442 24.7998 8.82348 24.796 8.85445 24.796H8.86413C8.87001 24.796 8.87572 24.7941 8.88161 24.7941V24.7939C9.97422 24.7659 11.0111 24.3052 11.7645 23.5133C12.517 22.7248 12.923 21.6681 12.8923 20.5785C12.8613 19.4889 12.3959 18.4571 11.5998 17.7123C11.0551 17.1665 10.3583 16.7977 9.60041 16.6545V7.05377C9.10875 7.2918 8.56279 7.39508 8.01821 7.35304C7.47345 7.31118 6.94982 7.12539 6.50041 6.81488C6.05113 7.12574 5.52732 7.31137 4.9826 7.35322C4.43784 7.39491 3.89189 7.29129 3.40041 7.05256V15.9026C3.81697 15.8154 4.92326 15.4338 5.27201 13.8508C5.31595 13.6529 5.5116 13.528 5.70968 13.571C5.90758 13.6143 6.03334 13.8096 5.99079 14.0077C5.5763 15.8986 4.17352 16.5477 3.40043 16.6486V16.6505C2.5621 16.8055 1.80007 17.2374 1.23632 17.8768C0.483814 18.6649 0.077626 19.7214 0.108582 20.8107C0.139547 21.9001 0.604891 22.9316 1.40102 23.6758C1.97381 24.2152 2.68876 24.5797 3.46185 24.7262C4.23495 24.8727 5.03364 24.7954 5.76418 24.503L5.76411 24.5033Z" fill="#4926E8"/>
                </svg>
                Минет
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'minet')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#massage"></use>
                </svg>
                Массаж
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'mass')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#sado"></use>
                </svg>
                Садо-мазо
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'bdsm')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="sidebar-tags__item sidebar-tags-item item">
            <div class="sidebar-tags-item__title item-content-title item-content-btn">
                <svg class="sidebar-tags-item__icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#dif"></use>
                </svg>
                Разное
                <svg class="sidebar-tags-item__title-icon">
                    <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                </svg>
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'other')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url"
                               title="Проститутки услугой {{ $item->value }}"
                               href="/{{ $item->filter_url }}"
                               class="sidebar-tags__item-list-link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
