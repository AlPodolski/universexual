@extends('intim-box.layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@php
    /* @var $post \App\Models\Post */
@endphp

@section('content')

    {!! $imageMicro !!}

    <div class="profile-main">
        <h2 class="profile__title">
            <div class="profile__title-text">
                Индивидуалка {{ $post->name }} {{ $post->id }}
            </div>
            <div class="profile__title-verif">
                <svg class="profile__title-icon">
                    <use xlink:href='/svg/dest/stack/sprite.svg#sec'></use>
                </svg>
            </div>
        </h2>
        <nav class="profile-main__nav profile-main-nav">
            <ul class="profile-main-nav__list">
                <li class="profile-main-nav__item active" data-tab-title="photo">
                    <a href="#" class="profile-main-nav__link link-reset">Фото</a>
                </li>
                <li class="profile-main-nav__item" data-tab-title="about">
                    <a href="#" class="profile-main-nav__link link-reset">О приститутке </a>
                </li>
                <li class="profile-main-nav__item">
                    <a href="#" class="profile-main-nav__link link-reset">Услуги</a>
                </li>
                <li class="profile-main-nav__item">
                    <a href="#" class="profile-main-nav__link link-reset" data-tab-title="reviews">Отзывы</a>
                </li>
                <li class="profile-main-nav__item">
                    <a href="#" class="profile-main-nav__link link-reset">Похожие анкеты</a>
                </li>
            </ul>
        </nav>
        <div class="profile-main__info profile-main-info profile-main__block">
            <div class="row">
                <div class="profile-main-info__media profile-main__tab show" data-tab="photo">
                    <div class="profile-main-info__slider">
                        <div class="profile-main-info__slider-main">

                            <div class="profile-main-info__slider-main-slide">
                                <img class="profile-main-info__slider-main-img"
                                     loading="lazy"
                                     src="/211-300/thumbs/{{$post->avatar}}" alt="">

                                @if($post->check_photo_status)
                                    <div class="profile-main-info__slider-main-verif">
                                        <div class="profile-main-info__slider-main-verif">
                                            <div class="profile-main-info__slider-main-verif-icon">
                                                <svg>
                                                    <use xlink:href='/svg/dest/stack/sprite.svg#camera'></use>
                                                </svg>
                                            </div>
                                            <div class="profile-main-info__slider-main-verif-text">
                                                Проверено
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @foreach($post->photo as $item)

                                <div class="profile-main-info__slider-main-slide">
                                    <img class="profile-main-info__slider-main-img"
                                         loading="lazy"
                                         src="/211-300/thumbs/{{$item->file}}" alt="">

                                    @if($post->check_photo_status)
                                        <div class="profile-main-info__slider-main-verif">
                                            <div class="profile-main-info__slider-main-verif">
                                                <div class="profile-main-info__slider-main-verif-icon">
                                                    <svg>
                                                        <use xlink:href='/svg/dest/stack/sprite.svg#camera'></use>
                                                    </svg>
                                                </div>
                                                <div class="profile-main-info__slider-main-verif-text">
                                                    Проверено
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            @endforeach

                        </div>
                    </div>
                    @if($post->video)
                        <div class="profile-main-info__video">
                            <div class="profile-main-info__video-text">
                                Видео
                            </div>
                            <a data-fancybox="video" href="{{ $post->video }}"
                               class="profile-main-info__video-bg">
                                <img class="profile-main-info__video-img"
                                     src="/intim-box/images/content/profile/profile-photo.jpg" alt="">

                                <img class="profile-main-info__video-icon"
                                     src="/intim-box/images/graphics/icons/play.svg"
                                     alt="">
                            </a>
                        </div>
                    @endif

                </div>
                <ul class="profile-main-info__characters profile-main__tab" data-tab="about">
                    <li class="profile-main-info__characters-item">
                        <div class="profile-main-info__characters-name">
                            Номер телефона
                        </div>
                        <div class="profile-main-info__characters-cur">
                            <a href="tel:+{{ $post->phone }}" class="catalog-item__phone">
                                <svg class="catalog-item__phone-icon">
                                    <use xlink:href='/svg/dest/stack/sprite.svg#phone'></use>
                                </svg>
                                {{ $post->phone }}
                            </a>
                        </div>
                    </li>
                    @if($post->telegram or $post->whats_ap)
                        <li class="profile-main-info__characters-item">
                            <div class="profile-main-info__characters-name">
                                Соц сети:
                            </div>
                            <div class="profile-main-info__characters-cur">
                                <ul class="profile-main-info__characters-social">
                                    @if($post->whats_ap)
                                        <li class="profile-main-info__characters-social-item">
                                            <a href="{{$post->whats_ap}}"
                                               class="profile-main-info__characters-social-link link-reset">
                                                <img src="/intim-box/images/graphics/icons/whatsapp.png" alt="">
                                            </a>
                                        </li>
                                    @endif

                                    @if($post->whats_ap)
                                        <li class="profile-main-info__characters-social-item">
                                            <a href="{{ $post->whats_ap }}"
                                               class="profile-main-info__characters-social-link link-reset">
                                                <img src="/intim-box/images/graphics/icons/telegram.png" alt="">
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </li>
                    @endif

                    <div class="profile-main-info__characters-alert">
                        Сообщите, что звоните с сайта Intim-Box <img class="emoji"
                                                                     src="/intim-box/images/graphics/icons/emoji.png"
                                                                     alt="">
                    </div>

                    @if($post->metro->first())

                        <li class="profile-main-info__characters-item">
                            <div class="profile-main-info__characters-name">
                                Метро
                            </div>
                            <div class="profile-main-info__characters-cur">
                                <ul class="profile-main-info__characters-metro">

                                    @foreach($post->metro as $item)

                                        <li class="catalog-item__location">
                                            <a href="#" class="catalog-item__location link-reset">
                                                <svg class="catalog-item__location-icon">
                                                    <use xlink:href='/svg/dest/stack/sprite.svg#metro'></use>
                                                </svg>
                                                <div class="catalog-item__location-text">
                                                    <a class="catalog-item__location-text"
                                                       href="/{{ $item->metro_url }}">{{ $item->metro_value }}</a>
                                                </div>
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>
                            </div>
                        </li>

                    @endif

                    @if(isset($post->rayon->filter->url))
                        <li class="profile-main-info__characters-item">
                            <div class="profile-main-info__characters-name">
                                Район:
                            </div>
                            <div class="profile-main-info__characters-cur">
                                <ul class="profile-main-info__characters-metro">
                                    <li class="catalog-item__location">
                                        <a href="/{{ $post->rayon->filter->url }}"
                                           class="catalog-item__location link-reset">
                                            <div class="catalog-item__location-text">
                                                {{ $post->rayon->value }}
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endif


                    <li class="profile-main-info__characters-item">
                        <ul class="profile-main-info__characters-price">
                            <li class="profile-main-info__characters-price__item">
                                <div class="profile-main-info__characters-price__wrapper">
                                    <div class="profile-main-info__characters-price-name">
                                        <img src="/intim-box/images/graphics/icons/buildings.svg" alt="">
                                        Апартаменты:
                                    </div>
                                    <ul class="profile-main-info__characters-price-sub-list">
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Час:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->price }}
                                            </div>
                                        </li>
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Два часа:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->apartament_2_hour_price }}
                                            </div>
                                        </li>
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Ночь:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->apartament_night_price }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="profile-main-info__characters-price__item">
                                <div class="profile-main-info__characters-price__wrapper">
                                    <div class="profile-main-info__characters-price-name">
                                        <img src="/intim-box/images/graphics/icons/auto.svg" alt="">
                                        Выезд
                                    </div>
                                    <ul class="profile-main-info__characters-price-sub-list">
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Час:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->exit_1_hour_price }}
                                            </div>
                                        </li>
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Два часа:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->exit_2_hour_price }}
                                            </div>
                                        </li>
                                        <li class="profile-main-info__characters-price-sub-item">
                                            <div class="profile-main-info__characters-price-sub-name">
                                                Ночь:
                                            </div>
                                            <div class="profile-main-info__characters-price-sub-cur price">
                                                {{ $post->exit_night_price }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="profile-main-info__characters-item">
                        <div class="profile-main-info__characters-params">
                            <div class="profile-main-info__characters-name">
                                Параметры:
                            </div>
                            <ul class="profile-main-info__characters-list-sec">
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->age }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Возраст
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->rost }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Рост
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->ves }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Вес
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->breast }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Грудь
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        @if($post->tatu)
                                            есть
                                        @else
                                            нет
                                        @endif
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Тату
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        @if($post->tatu)
                                            есть
                                        @else
                                            нет
                                        @endif
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Пирсинг
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="profile-main-info__characters-item">
                        <div class="profile-main-info__characters-params">
                            <div class="profile-main-info__characters-name">
                                Дополнительные параметры:
                            </div>
                            <ul class="profile-main-info__characters-list-sec">
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->hair_color }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Цвет волос
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->national_value }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Национальность
                                    </div>
                                </li>
                                <li class="profile-main-info__characters-list-sec-item">
                                    <div class="profile-main-info__characters-list-sec-cur">
                                        {{ $post->intim_hair }}
                                    </div>
                                    <div class="profile-main-info__characters-list-sec-name">
                                        Интимная стрижка
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="profile-main__about profile-main__block profile-main__tab" data-tab="about">
            <span class="profile-main__title">О себе:</span>{{ $post->about }}
        </div>
        <div class="profile-main__services profile-main__block">
            <div class="profile-main__services-header">
                <div class="profile-main__title">
                    Предоставляемые услуги:
                </div>
                <ul class="profile-main__services-guide">
                    <li class="profile-main__services-guide__item">
                        <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">
                        включено в стоимость
                    </li>
                    <li class="profile-main__services-guide__item">
                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                        услуга не предоставляется
                    </li>
                    <li class="profile-main__services-guide__item">
                        <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                        по симпатии
                    </li>
                    <li class="profile-main__services-guide__item">
                        <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                        за дополнительную плату
                    </li>
                </ul>
            </div>

            <div class="profile-main__services-body">
                <div class="profile-main__services-item">
                    Секс
                    <ul class="profile-main__services-list">

                        @foreach($data['service'] as $item)

                            @if($item->type == 'sex')
                                <li class="profile-main__services-list-item">

                                    @php
                                        $exist = false;
                                        $pay = false;
                                        $sympathy = false;
                                    @endphp

                                    @foreach($post->service as $serviceItem)

                                        @if($serviceItem->service_id == $item->id)

                                            @php
                                                $exist = true;
                                            @endphp

                                            @if($serviceItem->sympathy)
                                                @php
                                                    $sympathy = true;
                                                @endphp
                                            @endif

                                            @if($serviceItem->pay)
                                                @php
                                                    $pay = true;
                                                @endphp
                                            @endif

                                        @endif

                                    @endforeach
                                    @if($exist)

                                        @if($pay or $sympathy)

                                            @if($pay)
                                                <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                                            @endif

                                            @if($sympathy)
                                                <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                                            @endif

                                        @else

                                            <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">

                                        @endif

                                    @else
                                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                                    @endif
                                    {{ $item->value }}
                                </li>
                            @endif

                        @endforeach

                    </ul>
                </div>
                <div class="profile-main__services-item">
                    Окончание
                    <ul class="profile-main__services-list">
                        @foreach($data['service'] as $item)

                            @if($item->type == 'cum')
                                <li class="profile-main__services-list-item">

                                    @php
                                        $exist = false;
                                        $pay = false;
                                        $sympathy = false;
                                    @endphp

                                    @foreach($post->service as $serviceItem)

                                        @if($serviceItem->service_id == $item->id)

                                            @php
                                                $exist = true;
                                            @endphp

                                            @if($serviceItem->sympathy)
                                                @php
                                                    $sympathy = true;
                                                @endphp
                                            @endif

                                            @if($serviceItem->pay)
                                                @php
                                                    $pay = true;
                                                @endphp
                                            @endif

                                        @endif

                                    @endforeach
                                    @if($exist)

                                        @if($pay or $sympathy)

                                            @if($pay)
                                                <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                                            @endif

                                            @if($sympathy)
                                                <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                                            @endif

                                        @else

                                            <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">

                                        @endif

                                    @else
                                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                                    @endif
                                    {{ $item->value }}
                                </li>
                            @endif

                        @endforeach
                    </ul>
                </div>
                <div class="profile-main__services-item">
                    Массаж
                    <ul class="profile-main__services-list">
                        @foreach($data['service'] as $item)

                            @if($item->type == 'mass')
                                <li class="profile-main__services-list-item">

                                    @php
                                        $exist = false;
                                        $pay = false;
                                        $sympathy = false;
                                    @endphp

                                    @foreach($post->service as $serviceItem)

                                        @if($serviceItem->service_id == $item->id)

                                            @php
                                                $exist = true;
                                            @endphp

                                            @if($serviceItem->sympathy)
                                                @php
                                                    $sympathy = true;
                                                @endphp
                                            @endif

                                            @if($serviceItem->pay)
                                                @php
                                                    $pay = true;
                                                @endphp
                                            @endif

                                        @endif

                                    @endforeach
                                    @if($exist)

                                        @if($pay or $sympathy)

                                            @if($pay)
                                                <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                                            @endif

                                            @if($sympathy)
                                                <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                                            @endif

                                        @else

                                            <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">

                                        @endif

                                    @else
                                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                                    @endif
                                    {{ $item->value }}
                                </li>
                            @endif

                        @endforeach
                    </ul>
                </div>
                <div class="profile-main__services-item">
                    Садо-мазо
                    <ul class="profile-main__services-list">
                        @foreach($data['service'] as $item)

                            @if($item->type == 'bdsm')
                                <li class="profile-main__services-list-item">

                                    @php
                                        $exist = false;
                                        $pay = false;
                                        $sympathy = false;
                                    @endphp

                                    @foreach($post->service as $serviceItem)

                                        @if($serviceItem->service_id == $item->id)

                                            @php
                                                $exist = true;
                                            @endphp

                                            @if($serviceItem->sympathy)
                                                @php
                                                    $sympathy = true;
                                                @endphp
                                            @endif

                                            @if($serviceItem->pay)
                                                @php
                                                    $pay = true;
                                                @endphp
                                            @endif

                                        @endif

                                    @endforeach
                                    @if($exist)

                                        @if($pay or $sympathy)

                                            @if($pay)
                                                <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                                            @endif

                                            @if($sympathy)
                                                <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                                            @endif

                                        @else

                                            <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">

                                        @endif

                                    @else
                                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                                    @endif
                                    {{ $item->value }}
                                </li>
                            @endif

                        @endforeach
                    </ul>
                </div>
                <div class="profile-main__services-item profile-main__services-item_special">
                    Разное
                    <ul class="profile-main__services-list">
                        @foreach($data['service'] as $item)

                            @if($item->type == 'other')
                                <li class="profile-main__services-list-item">

                                    @php
                                        $exist = false;
                                        $pay = false;
                                        $sympathy = false;
                                    @endphp

                                    @foreach($post->service as $serviceItem)

                                        @if($serviceItem->service_id == $item->id)

                                            @php
                                                $exist = true;
                                            @endphp

                                            @if($serviceItem->sympathy)
                                                @php
                                                    $sympathy = true;
                                                @endphp
                                            @endif

                                            @if($serviceItem->pay)
                                                @php
                                                    $pay = true;
                                                @endphp
                                            @endif

                                        @endif

                                    @endforeach
                                    @if($exist)

                                        @if($pay or $sympathy)

                                            @if($pay)
                                                <img src="/intim-box/images/graphics/icons/money.svg" alt="">
                                            @endif

                                            @if($sympathy)
                                                <img src="/intim-box/images/graphics/icons/hearth.svg" alt="">
                                            @endif

                                        @else

                                            <img src="/intim-box/images/graphics/icons/onprice.svg" alt="">

                                        @endif

                                    @else
                                        <img src="/intim-box/images/graphics/icons/stop.svg" alt="">
                                    @endif
                                    {{ $item->value }}
                                </li>
                            @endif

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="profile-main__location profile-main__block">
            <div class="profile-main__location-title profile-main__title">
                Расположение
            </div>
            <div class="profile-main__location-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d81561.71249034205!2d57.00232709726561!3d50.2955955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x418223ab0c58cc63%3A0x41755c735d177cd!2zMtCT0JjQoQ!5e0!3m2!1sru!2skz!4v1672078297402!5m2!1sru!2skz"
                    width="" height="" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="profile-main__reviews profile-main-reviews profile-main__block profile-main__tab"
             data-tab="reviews">
            <div class="profile-main__title profile-main-reviews__title">Отзывы</div>
            <div class="profile-main-reviews__noreviews">
                <div class="profile-main-reviews__text">К этой анкете ещё нет ни одного отзыва. Вы можете
                    быть первым <img class="emoji" src="images/graphics/icons/emoji.png" alt=""></div>
                <button class="profile-main-reviews__btn btn profile__modal-toggle">
                    Оставить отзыв
                </button>
            </div>
            <div class="profile-main-reviews__items">
                <div class="profile-main-reviews__item">
                    <div class="profile-main-reviews__item-header">
                        <img src="/intim-box/images/content/comments/avatar.png" alt=""
                             class="profile-main-reviews__item-avatar">
                        <div class="profile-main-reviews__item-info">
                            <div class="profile-main-reviews__item-name">
                                nickname
                                <svg class="profile-main-reviews__item-icon">
                                    <use xlink:href='/svg/dest/stack/sprite.svg#verif2'></use>
                                </svg>
                            </div>
                            <div class="raiting profile-main-reviews__item-raiting">

                                <svg viewBox="0 0 190 32">
                                    <defs>
                                        <mask id="perc">
                                            <rect x="0%" y="0" width="100%" height="100%" fill="white"/>
                                            <!-- Для бэкенда, чтобы указать рейтинг укажите ниже в x="" процентное соотношение + 2 -->
                                            <rect x="52%" y="0" width="100%" height="100%" fill="black"/>
                                        </mask>

                                        <symbol viewBox="0 0 29 29" id="star">
                                            <path
                                                d="M15.7371 1.57498L18.8996 8.44998C19.0371 8.86248 19.4496 9.13748 19.8621 9.27498L27.0121 10.375C28.2496 10.375 28.6621 11.75 27.8371 12.575L22.6121 17.9375C22.3371 18.2125 22.1996 18.7625 22.1996 19.175L23.4371 26.6C23.5746 27.7 22.4746 28.6625 21.5121 28.1125L15.0496 24.5375C14.6371 24.2625 14.2246 24.2625 13.8121 24.5375L7.34959 28.1125C6.38709 28.6625 5.14959 27.8375 5.42459 26.6L6.66209 19.175C6.79959 18.7625 6.52459 18.2125 6.24959 17.9375L1.02459 12.575C0.337088 11.75 0.749588 10.375 1.84959 10.2375L8.99959 9.13748C9.41209 9.13748 9.82459 8.72498 9.96209 8.31248L13.1246 1.43748C13.8121 0.474981 15.1871 0.474981 15.7371 1.57498Z"/>
                                        </symbol>
                                        <symbol viewBox="0 0 190 32" id="stars">
                                            <use xlink:href="#star" x="-64" y="0"></use>
                                            <use xlink:href="#star" x="-30" y="0"></use>
                                            <use xlink:href="#star" x="4" y="0"></use>
                                            <use xlink:href="#star" x="38" y="0"></use>
                                            <use xlink:href="#star" x="74" y="0"></use>
                                        </symbol>
                                    </defs>

                                    <use xlink:href="#stars" fill="none" stroke="#FFCF03"></use>
                                    <use xlink:href="#stars" fill="#FFCF03" stroke="#FFCF03" mask="url(#perc)"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="profile-main-reviews__item-date">
                            2 дня назад
                        </div>
                    </div>
                    <div class="profile-main-reviews__body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('main-menu')
    @include('intim-box.include.main-menu', compact('data'))
@endsection

@section('location')
    @include('intim-box.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('intim-box.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection
