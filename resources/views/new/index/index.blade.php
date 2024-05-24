@extends('new.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($webmaster) and $webmaster)
    @section('webmaster', $webmaster['tag'])
@endif
@section('content')

    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif

    @include('new.include.main-menu', compact('data'))

    <div class="catalog">

        <div class=" main-top-menu">
            <ul class=" main-top-menu__list">
                <li class="main-top-menu__item active">
                    <a href="#" class="main-top-menu__link link-reset">
                        <svg class="main-top-menu__icon">
                            <use xlink:href='svg/dest/stack/sprite.svg#home'></use>
                        </svg>
                        Индивидуалки
                    </a>
                </li>
                <li class="main-top-menu__item">
                    <a href="#" class="main-top-menu__link link-reset">
                        <svg class="main-top-menu__icon">
                            <use xlink:href='svg/dest/stack/sprite.svg#verif'></use>
                        </svg>
                        Проверенные
                    </a>
                </li>
                <li class="main-top-menu__item">
                    <a href="#" class="main-top-menu__link link-reset">
                        <svg class="main-top-menu__icon">
                            <use xlink:href='svg/dest/stack/sprite.svg#new'></use>
                        </svg>
                        Новые
                    </a>
                </li>
                <li class="main-top-menu__item">
                    <a href="#" class="main-top-menu__link link-reset">
                        <svg class="main-top-menu__icon">
                            <use xlink:href='svg/dest/stack/sprite.svg#'></use>
                        </svg>
                        Дешевые
                    </a>
                </li>
                <li class="main-top-menu__item">
                    <a href="#" class="main-top-menu__link link-reset">
                        <svg class="main-top-menu__icon">
                            <use xlink:href='svg/dest/stack/sprite.svg#crown'></use>
                        </svg>
                        Элитные
                    </a>
                </li>
            </ul>
        </div>

        <div class="catalog__body">

            @include('new.include.filter' , compact('data'))

            <div class="catalog-descr">
                <h2 class="catalog-descr__title">
                    {{ $meta['h1'] }}
                </h2>
            </div>
            <div class="catalog-items">
                @php
                    $i = 0;
                @endphp

                @if($posts)
                    @foreach($posts as $post)
                        @include('new.include.item')
                        @php
                            $i ++;
                        @endphp
                    @endforeach
                @endif

            </div>

            @if($posts and $posts->total() > $posts->count())

                <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
                     class="get-more get-more-post-btn">Показать еще
                </div>

                {!! str_replace('http', 'https', $posts->links('new.vendor.pagination.bootstrap-4')) !!}
            @endif

        </div>

    </div>

@endsection

@section('location')
    @include('new.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/new/images/logo.png'])
@endsection
