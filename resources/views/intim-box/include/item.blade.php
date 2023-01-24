@php
/* @var $post \App\Models\Post */
@endphp
<div class="catalog-item">
    <div class="catalog-item__header">
        <img class="catalog-item__img" src="/211-300/thumbs/{{$post->avatar}}" alt="">
        <div class="catalog-item__favorite">
            <img src="/intim-box/images/graphics/catalog-page/favorite.png" alt="">
        </div>
    </div>
    <div class="catalog-item__body">
        <div class="catalog-item__title">
            <h4 class="catalog-item__title-text">
                {{ $post->name }}
            </h4>
            <img class="catalog-item__title-icon" src="/intim-box/images/graphics/catalog-page/diamond.png"
                 alt="">
            <a href="tel:+{{ $post->phone }}" class="catalog-item__phone">
                <svg class="catalog-item__phone-icon">
                    <use xlink:href='svg/dest/stack/sprite.svg#phone'></use>
                </svg>
                {{ $post->phone }}
            </a>
        </div>
        @if($metro = $post->metro->first())
            <div class="catalog-item__location">
                <svg class="catalog-item__location-icon">
                    <use xlink:href='svg/dest/stack/sprite.svg#metro'></use>
                </svg>
                <div class="catalog-item__location-text">
                    <a href="/{{ $metro->metro_url }}">{{ $metro->metro_value }}</a>
                </div>
            </div>
        @endif

        <ul class="catalog-item__list">
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Час
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur catalog-item__item-cur_price">
                    {{ $post->price }}
                </div>
            </li>
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Два
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur catalog-item__item-cur_price">
                    4 000
                </div>
            </li>
        </ul>
        <div class="catalog-item__tags">
            <a class="tag">
                #инди
            </a>
            <a class="tag">
                #выезд
            </a>
        </div>
        <ul class="catalog-item__list">
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Грудь
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur">
                    {{ $post->breast }}
                </div>
            </li>
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Вес
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur">
                    {{ $post->ves }}
                </div>
            </li>
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Рост
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur">
                    {{ $post->rost }}
                </div>
            </li>
            <li class="catalog-item__item">
                <div class="catalog-item__item-name">
                    Возраст
                </div>
                <div class="catalog-item__item-space">
                </div>
                <div class="catalog-item__item-cur">
                    {{ $post->age }}
                </div>
            </li>
        </ul>
        <ul class="catalog-item__ui">
            <li class="catalog-item__ui-item">
                <a href="#" class="catalog-item__ui-link link-reset btn">
                    <svg>
                        <use xlink:href='svg/dest/stack/sprite.svg#sec'></use>
                    </svg>
                </a>
            </li>
            <li class="catalog-item__ui-item">
                <a data-fancybox="video" href="https://www.youtube.com/watch?v=z2X2HaTvkl8"
                   class="catalog-item__ui-link link-reset btn">
                    <svg>
                        <use xlink:href='svg/dest/stack/sprite.svg#video'></use>
                    </svg>
                </a>
            </li>
            <li class="catalog-item__ui-item">
                <a href="#" class="catalog-item__ui-link link-reset btn">
                    <svg>
                        <use xlink:href='svg/dest/stack/sprite.svg#comment'></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <a href="#" class="catalog-item__link"></a>
</div>

