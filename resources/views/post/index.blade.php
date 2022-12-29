@extends('layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@php
    /* @var $post \App\Models\Post */
@endphp
@section('jquery', '/js/jquery-3.5.1.min.js')
@section('lightbox', '/js/lightgallery-all.min.js?v=2')
@section('content')
    @include('include.filter' , compact('data'))
    @include('include.breadcrumb' , ['title' => $post->name])

    {!! $imageMicro !!}

    <div class="content ">
        <div class="post-single d-flex">
            <div class="left">
                <img loading="lazy"
                         title="Проститутка {{ $post->name }}"
                     srcset="/600-700/thumbs/{{$post->avatar}}" alt="{{ $post->name }}">
            </div>
            <div class="right">
                <h1>Проститутка {{ $post->name }} ID {{ $post->id }}</h1>
                @if($post->check_photo_status)
                    <div class="bold-text green-text big-text m-bottom-20">Фото проверенно</div>
                @endif
                <div class="view-count"><img src="/img/view.png" alt=""> {{ $post->single_view }}</div>
                <div class="bold-text single-price m-bottom-20">От {{ $post->price }} р.</div>
                @if($post->phone)
                    <div onclick="phone(this)" data-phone="{{ $post->phone }}"
                         class="yellow-btn phone single-phone m-bottom-20">Показать телефон
                    </div>
                @else
                    <form action="/message/add" method="post" class="review-form m-top-20 m-bottom-20">
                        <div class="bold-text green-text big-text m-bottom-20">Написать сообщение</div>
                        @csrf
                        <input type="hidden"  name="posts_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="email">Ваша почта</label>
                            <input required type="text" name="email" id="email" placeholder="email">
                        </div>
                        <div class="form-group m-top-20">
                            <label for="text">Ваше сообщение</label>
                            <textarea required name="text" id="text" placeholder="Введите сообщение"></textarea>
                        </div>
                        <button class="yellow-btn m-top-20" type="submit">Отправить</button>
                    </form>
                @endif

                <div class="single-option m-bottom-20"><span class="bold-text">Район:</span>
                    <a href="/{{ $post->rayon_url }}">{{ $post->rayon_value }}</a>
                </div>
                @if($post->metro->first())
                    <div class="single-option m-bottom-20"><span class="bold-text">Метро: </span>
                        @foreach($post->metro as $item)
                            <a href="/{{ $item->metro_url }}">{{ $item->metro_value }}</a>
                            @if($post->metro->last() != $item)
                                ,
                            @endif
                        @endforeach
                    </div>
                @endif
                @if($post->place->first())
                    <div class="single-option m-bottom-20"><span class="bold-text">Место встречи: </span>
                        @foreach($post->place as $item)
                            <a href="/{{ $item->places_url }}">{{ $item->places_value }}</a>
                            @if($post->place->last() != $item)
                                ,
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="single-option m-bottom-20"><span class="bold-text">Возраст: </span>{{ $post->age }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Национальность: </span>{{ $post->national_value }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Цвет волос: </span>{{ $post->hair_color }}</div>
                <div class="single-option m-bottom-20"><span class="bold-text">Вес: </span>{{ $post->ves }}</div>
                <div class="single-option m-bottom-20"><span class="bold-text">Грудь: </span>{{ $post->breast }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Не моложе: </span>{{ $post->not_younger }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Интимная стрижка: </span>{{ $post->intim_hair }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Размер одежды: </span>{{ $post->clothing_size }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Размер обуви: </span>{{ $post->shoe_size }}</div>
                <div class="single-option m-bottom-20"><span
                        class="bold-text">Контактов в час: </span>{{ $post->contacts_per_hour }}</div>
            </div>
            <div class="more-post-info m-top-20">
                <div class="bold-text m-bottom-20">Услуги</div>
                <div class="service-list d-flex m-bottom-20">
                    @foreach($data['service'] as $item)
                        @php
                            /* @var $item \App\Models\Service */
                        @endphp
                        @php
                            $class = '';
                        @endphp

                        @foreach($post->service as $postServiceItem)

                            @if($postServiceItem->service_original_id == $item->id)
                                @php
                                    $class = 'exist';
                                @endphp
                            @endif

                        @endforeach

                        <a href="/{{ $item->url }}" class="service-list-item {{ $class }}">{{ $item->value }}</a>
                    @endforeach
                </div>
                <div class="about-text">
                    <div class="bold-text m-bottom-20">Описание</div>
                    {{ $post->about }}
                </div>
                @if($post->reviews->first())
                    <div class="review-list m-top-20">

                        <div class="bold-text m-bottom-20">Отзывы</div>

                        @foreach($post->reviews as $item)
                            <div class="review-item m-bottom-20">
                                <div class="user-name bold-text">{{ $item->name }}</div>
                                <div class="review-text">{{ $item->text }}</div>
                            </div>
                        @endforeach

                    </div>
                @endif

                @if($post->photo->first())
                    <div class="photo-wrap">
                        <div class="bold-text m-bottom-20">
                            Фото
                        </div>
                        <div class="popular-list post-photo" id="gallery">
                            @foreach($post->photo as $item)
                                <a class="post-photo-item" href="/600-700/thumbs{{$item->file}}" data-lightbox="image-{{ $post->id }}">
                                    <img data-lightbox="roadtrip" src="/600-700/thumbs{{$item->file}}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="/review/add" method="post" class="review-form m-top-20 m-bottom-20">
                    <div class="bold-text m-bottom-20">Написать отзыв</div>
                    @csrf
                    <input type="hidden" name="posts_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input placeholder="Имя" type="text" name="name" id="name">
                    </div>
                    <div class="form-group m-top-20">
                        <label for="text">Текст</label>
                        <textarea placeholder="Текст" name="text" id="text"></textarea>
                    </div>

                    <button class="yellow-btn m-top-20" type="submit">Отправить</button>

                </form>
            </div>
        </div>

    </div>
    @if($morePosts)
        <div class="bold-text m-bottom-20">Подобные анкеты</div>
        <div class="more-posts content d-flex">

            @foreach($morePosts as $post)
                @include('include.item')
            @endforeach
        </div>
    @endif

@endsection
@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => "/600-700/thumbs/$post->avatar"])
@endsection
