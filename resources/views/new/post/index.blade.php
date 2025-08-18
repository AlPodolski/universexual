@extends('new.layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@php
    /* @var $post \App\Models\Post */
@endphp

@section('location_metro')
    @include('new.include.location_metro')
@endsection

@section('filter')
    @include('new.include.filter')
@endsection

@if(isset($post->avatar))
    @section('open_img')
        /storage{{$post->avatar}}
    @endsection
@endif

@section('content')

    @if (session('success'))
        <div class="col-12">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="profile">
        @include('new.include.breadcrumb')
        <div class="info-photo-wrap">
            <div class="single-photo-wrap">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/storage{{$post->avatar}}"
                                 alt="{{ $post->name }} привлекальеная девушка из {{ $post->city->city2 }} цена от {{ $post->price }} руб">
                        </div>

                        @if($post->photo->first())

                            @foreach($post->photo as $item)
                                <div class="swiper-slide"><img src="/storage{{ $item->file }}"
                                                               alt="Индивидуалка {{ $post->name }}, доступна для личного знакомства от {{ $post->price }} руб">
                                </div>
                            @endforeach

                        @endif
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="info">
                <div class="single-name">{{ $post->name }}</div>
                <div class="single-phone-wrap d-flex">
                    <span class="phone-text">Номер телефона: </span>
                    <a class="phone" href="tel:+{{ $post->phone }}">{{ formatPhone($post->phone) }}</a>
                </div>
                <div class="info-wrap">
                    @if($post->metro->first())
                        <div class="info-item d-flex">
                            <span class="label">Метро:</span>
                            @foreach($post->metro as $item)
                                <div class="metro-items-wrap d-flex">
                                    <a class="orange-text d-flex" href="/{{ $item->metro_url }}">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="11" stroke="white" stroke-width="2"></circle>
                                            <path d="M6 17V7H8.5L12 13L15.5 7H18V17H16V11L13 17H11L8 11V17H6Z"
                                                  fill="white"></path>
                                        </svg>
                                        {{ $item->metro_value }}
                                        @if($item != $post->metro->last())
                                            ,
                                        @endif
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($post->rayon)
                        <div class="info-item">
                            <span class="label">Район:</span>
                            <a class="highlight" href="/{{ $post->rayon->filter->url}}">{{ $post->rayon->value }}</a>
                        </div>
                    @endif

                </div>

                <div class="pricing-block">
                    <div class="pricing-column">
                        <div class="pricing-header">
                            Апартаменты:
                        </div>
                        <ul>
                            <li><span>Час:</span> <strong>{{ $post->price }}</strong></li>
                            <li><span>Два часа:</span> <strong>{{ $post->two_hour_price ?? '-' }} ₽</strong></li>
                            <li><span>Ночь:</span> <strong>{{ $post->apartament_night_price ?? '-' }} ₽</strong></li>
                        </ul>
                    </div>

                    <div class="pricing-column">
                        <div class="pricing-header">
                            Выезд
                        </div>
                        <ul>
                            <li><span>Час:</span> <strong>{{ $post->exit_1_hour_price ?? '-' }} ₽</strong></li>
                            <li><span>Два часа:</span> <strong>{{ $post->exit_2_hour_price ?? '-' }} ₽</strong></li>
                            <li><span>Ночь:</span> <strong>{{ $post->exit_night_price ?? '-' }} ₽</strong></li>
                        </ul>
                    </div>
                </div>

                <div class="params-block">
                    <p class="params-heading">Параметры:</p>
                    <div class="params-grid">
                        <div><span class="value">{{ $post->age }}</span><span class="label">Возраст</span></div>
                        <div><span class="value">{{ $post->rost }}</span><span class="label">Рост</span></div>
                        <div><span class="value">{{ $post->ves }}</span><span class="label">Вес</span></div>
                        <div><span class="value">{{ $post->breast }}</span><span class="label">Грудь</span></div>
                        <div><span class="value">@if($post->tatu)
                                    есть
                                @else
                                    нет
                                @endif</span><span class="label">Тату</span></div>
                        <div><span class="value">@if($post->pircing)
                                    есть
                                @else
                                    нету
                                @endif</span><span class="label">Пирсинг</span></div>
                    </div>

                    <p class="params-heading">Дополнительные параметры:</p>
                    <div class="params-grid">
                        <div><span class="value">{{ $post->hair_color }}</span><span class="label">Цвет волос</span>
                        </div>
                        <div><span class="value">{{ $post->national_value }}</span><span
                                class="label">Национальность</span></div>
                        <div><span class="value">{{ $post->intim_hair }}</span><span class="label">Интим. стрижка</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bottom-info-item">
            <div class="red-heading">О себе</div>
            <div class="about-text">
                {{ $post->about }}
            </div>
        </div>

        @if($post->service->first())
            <div class="bottom-info-item">
                <div class="red-heading">Услуги</div>
                <div class="service-list">
                    @foreach($post->service as $item)
                        @if($item->not_available == 0)
                            <a class="service-item" href="/{{ $item->filter_url }}">{{ $item->value }}</a>
                            @if($item != $post->service->last())
                                ,
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        @php

            $x = '';
            $y = '';

            if ($metro = $post->metro->first()){
                $x = $metro->x;
                $y = $metro->y;
            }

        @endphp

        @if($x)
            <div class="bottom-info-item">
                <div class="red-heading">Я на карте</div>
                <div data-x="{{$x}}" data-y="{{ $y }}" id="map" style="width: 100%; height: 400px;"></div>
            </div>
        @endif

        @if($post->reviews->first())
            <div class="bottom-info-item">
                <div class="red-heading">Отзывы</div>
                @foreach($post->reviews as $item)
                    <div class="review">
                        <div class="review-author">{{ $item->name }}</div>
                        <div class="review-text">{{ $item->text }}</div>
                    </div>
                @endforeach
            </div>
        @endif

        <form action="/review/add" method="post" class="review-form bottom-info-item">
            @csrf
            <input name="posts_id" type="hidden" value="{{ $post->id }}">
            <p class="red-heading">Добавить отзыв</p>

            <input placeholder="Имя" type="text" name="name" class="review-input" required>
            <textarea class="review-textarea" placeholder="Комментарий" name="text" required></textarea>

            <button class="red-btn">Отправить</button>
        </form>

    </div>

@endsection
@section('catalog')
    @include('new.include.catalog-menu')
@endsection
