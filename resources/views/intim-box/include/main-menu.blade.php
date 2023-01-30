<div class="sidebar">
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
                <a href="/video" class="sidebar__types-link link-reset link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#video"></use>
                    </svg>
                    С видео
                </a>
            </li>
            <li class="sidebar__types-item">
                <a href="/intim-salony" class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#home-location"></use>
                    </svg>
                    Интим-салоны
                </a>
            </li>
            <li class="sidebar__types-item">
                <a href="/eroticeskii-massaz" class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#massage"></use>
                    </svg>
                    Массажистки
                </a>
            </li>
            <li class="sidebar__types-item">
                <a href="/intim-karta" class="sidebar__types-link link-reset">
                    <svg class="sidebar__types-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#location"></use>
                    </svg>
                    Интим-карта
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar__filters sidebar-filters">
        <ul class="sidebar-filters__list">
            <!-- tabindex нужны для навигации клавиатурой, также отвечают за табы на мобильной версии -->
            <li class="sidebar-filters__item" tabindex="0">
                <div class="sidebar-filters__item-title">
                    <div class="sidebar-filters__item-text">
                        Цена
                    </div>
                    <svg class="sidebar-filters__item-icon">
                        <use xlink:href="/svg/dest/stack/sprite.svg#arrow"></use>
                    </svg>
                </div>
                <ul class="sidebar-filters-sub__list">

                    <div class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/dorogie-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Дорогие проститутки</span>
                        </a>
                    </div>

                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/deshevye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Дешевые проститутки</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="0">
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
                            <a itemprop="url" href="/{{ $item->filter_url }}"
                               class="sidebar-filters-sub__link link-reset">
                                <span itemprop="name">{{ $item->value }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="0">
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
                        <a itemprop="url" href="/molodye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Молодые проститутки</span>
                        </a>
                    </li>

                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/starye-prostitutki" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Старые проститутки</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="0">
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
                        <a itemprop="url" href="/visokie" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Высокие</span>
                        </a>
                    </li>
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/nizkie" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Низкие</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="0">
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
                        <a itemprop="url" href="/tolstye" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Толстые</span>
                        </a>
                    </li>
                    <li class="sidebar-filters-sub__item">
                        <a itemprop="url" href="/hudye" class="sidebar-filters-sub__link link-reset">
                            <span itemprop="name">Худые</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-filters__item" tabindex="0">
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
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
            </div>
            <ul class="sidebar-tags__item-list item-content">

                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'sex')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'cum')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'mass')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'bdsm')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
            </div>
            <ul class="sidebar-tags__item-list item-content">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @if($item->type == 'other')
                        <li class="sidebar-tags__item-list-item">
                            <a itemprop="url" href="/{{ $item->filter_url }}"
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
