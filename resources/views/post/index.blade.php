@extends('layouts.main')
@php
    /* @var $post \App\Models\Post */
@endphp

@section('content')
    <div class="content ">
        <div class="post-single d-flex">
            <div class="left"><img src="{{ $post->avatar }}" alt=""></div>
            <div class="right">
                <h1>{{ $post->name }}</h1>
                <div class="bold-text single-price m-bottom-20">От {{ $post->price }} р.</div>
                <div onclick="phone(this)" data-phone="{{ $post->phone }}"
                     class="yellow-btn phone single-phone m-bottom-20">Показать телефон
                </div>
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

                        <a  href="/{{ $item->url }}" class="service-list-item {{ $class }}">{{ $item->value }}</a>
                    @endforeach
                </div>
                <div class="about-text">
                    <div class="bold-text m-bottom-20">Описание</div>
                    {{ $post->about }}
                </div>
                <div class="review-list m-top-20">
                    <div class="bold-text m-bottom-20">Отзывы</div>
                    <div class="review-item">
                        <div class="user-name bold-text">Игор</div>
                        <div class="review-text">Єто мой сайт</div>
                    </div>
                </div>
                <form class="review-form m-top-20 m-bottom-20">
                    <div class="bold-text m-bottom-20">Написать отзыв</div>
                    @csrf
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
@endsection
@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection
