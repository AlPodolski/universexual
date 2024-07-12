@php
    /* @var $post \App\Models\Post */
@endphp

<div class="catalog-item">
    <a href="/user/{{$post->url}}" class="catalog-item__header">
        <picture>
            <source srcset="/400-500/thumbs/{{str_replace('.jpg', '.webp', $post->avatar)}}" type="image/webp">
            <source srcset="/400-500/thumbs/{{$post->avatar}}" type="image/jpeg">
            <img class="catalog-item__img" src="/400-500/thumbs/{{$post->avatar}}"
                 alt="{{ $post->alt }}"
                 @if(!isset($i) or $i > 2)
                     loading="lazy"
                 @endif
                 title="{{ $post->title }}">
        </picture>
    </a>
    <div class="catalog-item__body">
        <div class="catalog-item__title">
            <div class="catalog-item__title-info">
                <a href="/user/{{ $post->url }}" class="catalog-item__title-text">
                    {{ $post->name }}, {{ $post->age }}
                </a>
                <img class="catalog-item__title-icon" src="/files/images/graphics/icons/fire-strong.svg" alt="">
            </div>
            <button class="catalog-item__favorite">
                <img src="/images/graphics/catalog-page/favorite.webp" alt="">
            </button>
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

        <a data-id="{{ $post->id }}"
           data-city="{{ $post->city_id }}"
           onclick="show_phone(this);ym(92632574,'reachGoal','Call')"
           class="catalog-item__phone">
            <svg class="catalog-item__phone-icon">
                <use xlink:href='/svg/dest/stack/sprite.svg#phone'></use>
            </svg>
            Показать телефон
        </a>
        <ul class="catalog-item__list catalog-item__list_border">
            <li class="catalog-item__list-item">
                <div class="catalog-item__list-name">
                    Час
                </div>
                <div class="catalog-item__list-cur catalog-list__item-cur_price">
                    {{ $post->price }}
                </div>
            </li>
            <li class="catalog-item__list-item">
                <div class="catalog-item__list-name">
                    Два
                </div>
                <div class="catalog-item__list-cur catalog-item__list-cur_price">
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
            <li class="catalog-item__list-item">
                <div class="catalog-item__list-name">

                    <svg class="catalog-item__list-icon">
                        <use xlink:href='/svg/dest/stack/sprite.svg#size'></use>
                    </svg>
                </div>
                <div class="catalog-item__list-cur">
                    {{ $post->breast }}
                </div>
            </li>
            <li class="catalog-item__list-item">
                <div class="catalog-item__list-name">
                    <svg class="catalog-item__list-icon">
                        <use xlink:href='/svg/dest/stack/sprite.svg#weight'></use>
                    </svg>
                </div>
                <div class="catalog-item__list-cur">
                    {{ $post->ves }}
                </div>
            </li>
            <li class="catalog-item__list-item">
                <div class="catalog-item__list-name">

                    <svg class="catalog-item__list-icon catalog-item__list-icon_height">
                        <use xlink:href='/svg/dest/stack/sprite.svg#height'></use>
                    </svg>
                </div>
                <div class="catalog-item__list-cur">
                    {{ $post->rost }}
                </div>
            </li>
        </ul>
        <ul class="catalog-item__ui">
            <li class="catalog-item__ui-item">
                <a href="#" class="catalog-item__ui-link link-reset btn">
                    <svg>
                        <use xlink:href='/svg/dest/stack/sprite.svg#sec'></use>
                    </svg>
                </a>
            </li>
            @if($post->video)
                <li class="catalog-item__ui-item">
                <span class="catalog-item__ui-link link-reset btn">
                    <img src="/files/images/video.svg" alt="">
                </span>
                </li>
            @endif

            @if($post->reviews->first())
                <li class="catalog-item__ui-item">
                    <a href="#" class="catalog-item__ui-link link-reset btn">
                        <img src="/files/images/comment.svg" alt="">
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>

