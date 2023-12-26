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

                <picture>

                    <source srcset="/700-1000/thumbs/{{str_replace('.jpg', '.webp', $post->avatar)}}" type="image/webp">
                    <source srcset="/700-1000/thumbs/{{$post->avatar}}" type="image/jpeg">

                    <img class="catalog-item__img" src="/400-500/thumbs/{{$post->avatar}}"
                         alt="{{ $post->name }}"
                         loading="lazy"
                         title="Проститутка {{ $post->title }}">
                </picture>

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

                <div class="bold-text single-price m-bottom-20">
                    <div class="time-column">
                        <div class="single-price-heading bold-text">Время</div>
                        <div class="time-column-item">Час</div>
                        <div class="time-column-item">Два</div>
                        <div class="time-column-item">Ночь</div>
                        <div class="time-column-item">Экспресс</div>
                    </div>
                    <div class="apartament-column">
                        <div class="single-price-heading bold-text">Апартаменты</div>
                        <div class="time-column-item">{{ $post->price }}</div>
                        <div class="time-column-item">
                            @if($post->apartament_2_hour_price)
                                {{ $post->apartament_2_hour_price }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="time-column-item">
                            @if($post->apartament_night_price)
                                {{ $post->apartament_night_price }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="time-column-item">
                            @if($post->express)
                                {{ $post->express }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="exit-column">
                        <div class="single-price-heading bold-text">Выезд</div>
                        <div class="time-column-item">
                            @if($post->exit_1_hour_price)
                                {{ $post->exit_1_hour_price }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="time-column-item">
                            @if($post->exit_2_hour_price)
                                {{ $post->exit_2_hour_price }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="time-column-item">
                            @if($post->exit_night_price)
                                {{ $post->exit_night_price }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="time-column-item">
                                -
                        </div>
                    </div>
                </div>

                @if($post->phone)
                    <div onclick="phone(this)" data-id="{{ $post->id }}" data-city="{{ $post->city_id }}"
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

                <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="whiteblack" data-limit="0"
                     data-more-button-type="short" data-services="vkontakte,odnoklassniki,telegram,whatsapp"></div>

                @if($post->rayon)

                    <div class="single-option m-bottom-20">
                        <span class="bold-text">Район:</span>
                        <a href="/{{ $post->rayon->filter->url }}">{{ $post->rayon->value }}</a>
                    </div>

                @endif

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
            <div class="bold-text m-bottom-20">Услуги</div>
            <div class="service-list d-flex m-bottom-20">
                @foreach($data['service'] as $item)
                    @php
                        /* @var $item \App\Models\Service */
                    @endphp
                    @php
                        $class = '';
                        $pay = false;
                        $sympathy = false;
                    @endphp

                    @foreach($post->service as $postServiceItem)

                        @if($postServiceItem->service_id == $item->id)
                            @php
                                $class = 'exist';
                            @endphp
                            @if($postServiceItem->sympathy)
                                @php
                                    $sympathy = true;
                                @endphp
                            @endif
                            @if($postServiceItem->pay)
                                @php
                                    $pay = true;
                                @endphp
                            @endif
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
                            @if($pay)
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                     width="512" height="512" x="0" y="0" viewBox="0 0 64 64"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <path
                                            d="M59.125 33.873a7.432 7.432 0 0 0-7.978.773l-6.085 4.786a6.6 6.6 0 0 0-6.212-2.409l-9.976 1.594a2.407 2.407 0 0 1-1.21-.145 14.457 14.457 0 0 0-13.292 1.823 3.005 3.005 0 0 0-3.268-2.01l-4.566.661a3.004 3.004 0 0 0-2.54 3.399l2.12 14.654a3.015 3.015 0 0 0 3.399 2.539l4.566-.661a2.959 2.959 0 0 0 2.511-2.435l2.658-2.045a3.385 3.385 0 0 1 2.311-.682l13.246 1.035a11.919 11.919 0 0 0 9.174-3.28l15.519-14.88a1.69 1.69 0 0 0-.377-2.717zm-44.67 22.634a1 1 0 0 1-.658.391l-4.567.662a1 1 0 0 1-1.132-.848l-2.12-14.653a1.003 1.003 0 0 1 .846-1.134l4.566-.661a1.006 1.006 0 0 1 1.133.847l2.12 14.655a.994.994 0 0 1-.188.74zm28.144-6.48a9.936 9.936 0 0 1-7.634 2.729L21.716 51.72a5.354 5.354 0 0 0-3.68 1.088l-1.619 1.246-1.675-11.574a12.556 12.556 0 0 1 12.226-2.134 4.331 4.331 0 0 0 2.222.245l9.977-1.594a4.633 4.633 0 0 1 5.16 3.242l-11.754 1.93a1 1 0 0 0 .324 1.973l12.13-1.99a1.69 1.69 0 0 0 1.322-2.141c-.092-.257-.166-.583-.279-.83l6.315-4.964a5.433 5.433 0 0 1 5.407-.759zM14.807 33.312h32.937a3.003 3.003 0 0 0 3-3v-1.7c.188-.003 2.593.406 2.78.36a3.012 3.012 0 0 0 2.956-2.581l1.961-13.963a2.998 2.998 0 0 0-2.551-3.376l-32.616-4.59a3.013 3.013 0 0 0-3.395 2.55l-.87 6.205h-4.202a3.003 3.003 0 0 0-3 3v14.095a3.003 3.003 0 0 0 3 3zm7.253-18.095h18.431a6.818 6.818 0 0 0 6.732 5.813h1.521v4.468h-1.521a6.819 6.819 0 0 0-6.733 5.814H22.06a6.818 6.818 0 0 0-6.731-5.814h-1.522V21.03h1.522a6.818 6.818 0 0 0 6.731-5.813zm26.684 3.813h-1.521a4.82 4.82 0 0 1-4.706-3.813h5.227a1 1 0 0 1 1 1zM13.807 30.312v-2.814h1.522a4.82 4.82 0 0 1 4.706 3.814h-5.228a1.001 1.001 0 0 1-1-1zm33.937 1h-5.228a4.82 4.82 0 0 1 4.707-3.814h1.521v2.814a1 1 0 0 1-1 1zM21.86 7.288a1.004 1.004 0 0 1 1.13-.847l32.624 4.592a.994.994 0 0 1 .846 1.12l-1.959 13.954a1.002 1.002 0 0 1-1.133.854l-2.624-.368V16.217a3.003 3.003 0 0 0-3-3H21.03zm-7.053 7.929h5.227a4.82 4.82 0 0 1-4.705 3.813h-1.522v-2.813a1.001 1.001 0 0 1 1-1z"
                                            fill="#f2cd85" data-original="#000000" class=""></path>
                                        <path
                                            d="M31.275 30.428a7.172 7.172 0 0 0 7.164-7.164c-.336-9.48-13.993-9.479-14.327 0a7.172 7.172 0 0 0 7.163 7.164zm0-12.327c6.826.217 6.823 10.111 0 10.327-6.823-.217-6.822-10.111 0-10.327z"
                                            fill="#f2cd85" data-original="#000000" class=""></path>
                                    </g></svg>
                            @endif

                            @if($sympathy)
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                     width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <path
                                            d="M407.815 0h-303.63c-21.38 0-41.736 6.707-58.87 19.394a7.527 7.527 0 0 0 8.959 12.099c14.522-10.754 31.781-16.439 49.911-16.439h303.629c46.296 0 83.96 37.665 83.96 83.96v199.144c0 46.296-37.665 83.96-83.96 83.96H279.48a11.317 11.317 0 0 0-8.217 3.553l-103.068 109.59c-2.225 2.364-4.805 1.693-5.81 1.296-1.006-.398-3.345-1.676-3.345-4.924V393.4c0-6.22-5.06-11.28-11.28-11.28h-43.575c-46.296 0-83.961-37.665-83.961-83.96V99.014c0-17.032 5.069-33.429 14.66-47.417a7.528 7.528 0 0 0-12.415-8.513C11.153 59.59 5.171 78.93 5.171 99.014v199.144c0 54.596 44.418 99.014 99.015 99.014h39.801v94.461c0 8.398 5.044 15.824 12.851 18.918a20.458 20.458 0 0 0 7.543 1.449c5.489 0 10.84-2.237 14.78-6.425l101.95-108.402h126.704c54.596 0 99.014-44.418 99.014-99.014V99.014C506.829 44.418 462.412 0 407.815 0z"
                                            fill="#f2cd85" data-original="#000000" class=""></path>
                                        <path
                                            d="M364.119 120.935c-26.124-26.125-68.635-26.123-94.761 0l-13.119 13.12c-.035.035-.143.143-.344.143a.453.453 0 0 1-.342-.143l-12.911-12.91c-26.125-26.125-68.635-26.124-94.76 0-26.125 26.125-26.125 68.636 0 94.761l97.035 97.035c2.935 2.935 6.837 4.551 10.987 4.551s8.053-1.617 10.987-4.552l53.325-53.334a7.524 7.524 0 0 0-.001-10.644 7.525 7.525 0 0 0-10.644.001l-53.325 53.334a.464.464 0 0 1-.342.141.454.454 0 0 1-.343-.143l-97.035-97.035c-20.256-20.257-20.256-53.215 0-73.472s53.215-20.255 73.471 0l12.91 12.91a15.437 15.437 0 0 0 10.987 4.552c4.151 0 8.052-1.616 10.988-4.551l13.12-13.12c20.26-20.255 53.216-20.255 73.472 0 20.256 20.256 20.256 53.214 0 73.472l-22.472 22.477a7.524 7.524 0 0 0 .001 10.644 7.525 7.525 0 0 0 10.644-.001l22.473-22.476c26.124-26.125 26.124-68.635-.001-94.76z"
                                            fill="#f2cd85" data-original="#000000" class=""></path>
                                    </g></svg>
                            @endif
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

    <script src="https://yastatic.net/share2/share.js"></script>

@endsection
@section('main-menu')
    @include('prostitutki_nl.include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('prostitutki_nl.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => "/600-700/thumbs/$post->avatar"])
@endsection

@section('metro-list')
    @include('prostitutki_nl.include.metro-list', compact('data'))
@endsection
