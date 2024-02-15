@php
    /* @var $post \App\Models\Post */
@endphp
<div class="catalog-item">
    <div class="catalog-item__header">
        <div class="catalog-item-gallery">
            <picture class="listing-slick">
                <source srcset="/400-500/thumbs/{{str_replace('.jpg', '.webp', $post->avatar)}}" type="image/webp">
                <source srcset="/400-500/thumbs/{{$post->avatar}}" type="image/jpeg">
                <img class="catalog-item__img" src="/400-500/thumbs/{{$post->avatar}}"
                     alt="{{ $post->alt }}"
                     @if(!isset($i) or $i > 2)
                         loading="lazy"
                     @endif
                     title="{{ $post->title }}">
            </picture>

            @if($post->photo)
                @foreach($post->photo as $item)
                    <picture class="listing-slick">
                        <source srcset="/400-500/thumbs{{str_replace('.jpg', '.webp', $item->file)}}"
                                type="image/webp">
                        <source srcset="/400-500/thumbs{{$item->file}}" type="image/jpeg">
                        <img class="catalog-item__img" src="/400-500/thumbs{{$item->file}}"
                             alt="{{ $post->alt }}"
                             loading="lazy"
                             title="{{ $post->title }}">
                    </picture>
                @endforeach
            @endif

        </div>
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

        @if($post->tarif_id)
            <div class="tarif tarif_{{ $post->tarif_id }}">
            </div>
        @endif

    </div>
    <div class="catalog-item__body">
        <div class="catalog-item__title">
            <a href="/post/{{ $post->url }}" class="catalog-item__title-text">
                {{ $post->name }}
            </a>
            <a data-id="{{ $post->id }}"
               data-city="{{ $post->city_id }}"
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
            @if($post->service)
                @foreach($post->service as $item)
                    @if($item->id == 20)
                        <a class="tag" href="/{{ $item->filter_url  }}">#Анал</a>
                    @endif
                    @if($item->id == 12)
                        <a class="tag" href="/{{ $item->filter_url  }}">#Куни</a>
                    @endif
                    @if($item->id == 22)
                        <a class="tag" href="/{{ $item->filter_url  }}">#МБР</a>
                    @endif
                    @if($item->id == 7)
                        <a class="tag" href="/{{ $item->filter_url  }}">#МинетВМашине</a>
                    @endif
                @endforeach
            @endif
            @foreach($post->place as $item)
                <a class="tag" href="/{{ $item->places_url }}">#{{ $item->places_value }}</a>
            @endforeach
            @if($post->national)
                <a class="tag" href="/{{ $post->national->filter_url }}">#{{ $post->national->value }}</a>
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
                    <div href="#"
                         class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#sec'></use>
                        </svg>
                    </div>
                </div>
            @endif

            @if($post->video)
                <div class="catalog-item__ui-item">
                    <div class="catalog-item__ui-item-title">
                        Есть видео
                    </div>
                    <div
                        class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#video'></use>
                        </svg>
                    </div>
                </div>
            @endif

            @if($post->reviews->first())
                <div class="catalog-item__ui-item">
                    <div class="catalog-item__ui-item-title">
                        Есть отзывы
                    </div>
                    <div class="catalog-item__ui-link link-reset btn">
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#comment'></use>
                        </svg>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <a href="#" class="catalog-item__link"></a>
</div>

