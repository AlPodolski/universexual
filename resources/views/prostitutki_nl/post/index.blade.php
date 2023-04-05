@extends('prostitutki_nl.layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@php
    /* @var $post \App\Models\Post */
@endphp
@section('jquery', '/js/jquery-3.5.1.min.js')
@section('lightbox', '/js/lightgallery-all.min.js?v=2')
@section('content')
    @include('prostitutki_nl.include.filter' , compact('data'))
    @include('prostitutki_nl.include.breadcrumb' , ['title' => $post->name])

    {!! $imageMicro !!}

    <div class="content ">
        <div class="post-single d-flex">
            <div class="left">
                <img loading="lazy"
                     title="Проститутка {{ $post->name }}"
                     srcset="/600-700/thumbs/{{$post->avatar}}"
                     alt="{{ $post->name }}">
            </div>
            <div class="right">
                <h1>Проститутка {{ $post->name }} ID {{ $post->id }}</h1>
                @if($post->check_photo_status)
                    <div class="bold-text green-text big-text m-bottom-20 d-flex check-photo-single">
                        Фото проверенно
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                             class=""><g>
                                <path fill="#2ad352"
                                      d="M256 0C114.62 0 0 114.58 0 256s114.62 256 256 256 256-114.65 256-256S397.38 0 256 0z"
                                      data-original="#2ad352"></path>
                                <path fill="#74da7f"
                                      d="M0 256a254.87 254.87 0 0 0 30.49 121.23 278.76 278.76 0 0 0 78.73 11.29c153.9 0 278.66-124.76 278.66-278.66a278.7 278.7 0 0 0-11.64-79.94A254.86 254.86 0 0 0 256 0C114.62 0 0 114.58 0 256z"
                                      data-original="#74da7f"></path>
                                <path fill="#ffffff"
                                      d="M402 213.58 248.13 375.17a45.16 45.16 0 0 1-32.48 14h-.2a45.11 45.11 0 0 1-32.4-13.71l-81.65-84.1a45.14 45.14 0 1 1 64.78-62.87l48.95 50.42 121.49-127.58A45.14 45.14 0 1 1 402 213.58z"
                                      data-original="#ffffff"></path>
                            </g></svg>
                    </div>
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
                        <input type="hidden" name="posts_id" value="{{ $post->id }}">
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

                        @if($postServiceItem->service_id == $item->id)
                            @php
                                $class = 'exist';
                            @endphp
                        @endif

                    @endforeach

                    <a href="/{{ $item->filter_url }}" class="service-list-item {{ $class }}">
                        @if($class)
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                 width="24" height="24" x="0" y="0" viewBox="0 0 511.985 511.985"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <path
                                        d="M500.088 83.681c-15.841-15.862-41.564-15.852-57.426 0L184.205 342.148 69.332 227.276c-15.862-15.862-41.574-15.862-57.436 0-15.862 15.862-15.862 41.574 0 57.436l143.585 143.585c7.926 7.926 18.319 11.899 28.713 11.899 10.394 0 20.797-3.963 28.723-11.899l287.171-287.181c15.862-15.851 15.862-41.574 0-57.435z"
                                        fill="#f2cd85" data-original="#000000" class=""></path>
                                </g></svg>
                        @endif
                        {{ $item->value }}
                    </a>
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
                            <a class="post-photo-item" href="/600-700/thumbs{{$item->file}}"
                               data-lightbox="image-{{ $post->id }}">
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
    @if($morePosts)
        <div class="bold-text m-bottom-20">Подобные анкеты</div>
        <div class="more-posts content d-flex">

            @foreach($morePosts as $post)
                @include('prostitutki_nl.include.item')
            @endforeach
        </div>
    @endif

@endsection
@section('main-menu')
    @include('prostitutki_nl.include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('prostitutki_nl.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => "/600-700/thumbs/$post->avatar"])
@endsection
