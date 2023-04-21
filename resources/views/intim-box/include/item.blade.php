@php
    /* @var $post \App\Models\Post */
@endphp
<div class="catalog-item">
    <div class="catalog-item__header">
        <a href="/post/{{ $post->url }}">
            <picture>

                <source srcset="/400-500/thumbs/{{str_replace('.jpg', '.webp', $post->avatar)}}" type="image/webp">
                <source srcset="/400-500/thumbs/{{$post->avatar}}" type="image/jpeg">

                <img class="catalog-item__img" src="/400-500/thumbs/{{$post->avatar}}"
                     alt="{{ $post->alt }}"
                     @if($i > 2)
                         loading="lazy"
                     @endif
                     title="{{ $post->title }}">
            </picture>

        </a>
        <div data-id="{{ $post->id }}" onclick="add_to_favorite(this)"
             class="
             @if(\App\Actions\AddFavoriteToCookie::check($post->id))
                 catalog-item__favorite_add
             @endif
             catalog-item__favorite
             ">
            <img
                width="27px"
                height="23px"
                src="/intim-box/images/graphics/catalog-page/favorite.png" alt="">
        </div>
    </div>
    <div class="catalog-item__body">
        <div class="catalog-item__title">
            <a href="/post/{{ $post->url }}" class="catalog-item__title-text">
                {{ $post->name }}
            </a>
            <a data-tel="{{ $post->phone }}"
               onclick="show_phone(this)"
               class="catalog-item__phone">
                <svg class="catalog-item__phone-icon">
                    <use xlink:href='/svg/dest/stack/sprite.svg#phone'></use>
                </svg>
                Показать телефон
            </a>
        </div>

        @if($metro = $post->metro->first())

            @if(isset($data['current_metro']))

                @foreach($post->metro as $metroItem)

                    @if($metroItem->id == $data['current_metro']->id)

                        <div class="catalog-item__location">
                            <svg class="catalog-item__location-icon">
                                <use xlink:href='/svg/dest/stack/sprite.svg#metro'></use>
                            </svg>
                            <div class="catalog-item__location-text">
                                <a href="/{{ $metroItem->metro_url }}">{{ $metroItem->metro_value }}</a>
                            </div>
                        </div>

                    @endif

                @endforeach

            @else

                <div class="catalog-item__location">
                    <svg class="catalog-item__location-icon">
                        <use xlink:href='/svg/dest/stack/sprite.svg#metro'></use>
                    </svg>
                    <div class="catalog-item__location-text">
                        <a href="/{{ $metro->metro_url }}">{{ $metro->metro_value }}</a>
                    </div>
                </div>

            @endif

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
                    {{ $post->apartament_2_hour_price }}
                </div>
            </li>
        </ul>
        <div class="catalog-item__tags">
            @if($post->type == \App\Models\Post::INDI_TYPE)
                <a class="tag">
                    #инди
                </a>
            @endif
            @if($post->place->first())
                @foreach($post->place as $item)
                    @if($item->id == 1)
                        <a class="tag">
                            #выезд
                        </a>
                    @endif
                @endforeach
            @endif
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
        <div class="catalog-item__ui">

            @if($post->check_photo_status)
                <div class="catalog-item__ui-item">
                    <div class="catalog-item__ui-item-title">
                        Проверенное фото
                    </div>
                    <a href="#"
                       class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#sec'></use>
                        </svg>
                    </a>
                </div>
            @endif

            @if($post->video)
                <div class="catalog-item__ui-item">
                    <div class="catalog-item__ui-item-title">
                        Есть видео
                    </div>
                    <a data-fancybox="video"
                       class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#video'></use>
                        </svg>
                    </a>
                </div>
            @endif

            @if($post->reviews->first())
                <div class="catalog-item__ui-item">
                    <div class="catalog-item__ui-item-title">
                        Есть отзывы
                    </div>
                    <a class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#comment'></use>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </div>
    <a href="#" class="catalog-item__link"></a>
</div>

