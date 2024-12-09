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

    <div class="row">
        <div class="col-12">
            <h1 class="big-red-text">{{ $meta['h1'] }}</h1>
            <p class="small-black-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>
    <div class="row posts">
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

    @include('new.include.main-menu', compact('data'))

    <div class="catalog">

        @include('new.include.top-menu')

        <div class="catalog__body">

            @include('new.include.filter' , compact('data'))

            <div class="catalog-items">


            </div>
            <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
                 class="get-more get-more-post-btn">Показать еще
            </div>
            @if($posts and $posts->total() > $posts->count())
                {!! str_replace('http', 'https', $posts->links('new.vendor.pagination.bootstrap-4')) !!}
            @endif

        </div>

    </div>

    <form action="/submit" method="post">
        <!-- Поле для ввода имени -->
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <!-- Поле для ввода текста -->
        <label for="text">Текст:</label>
        <textarea id="text" name="text" rows="4" cols="50" required></textarea>
        <br><br>

        <!-- Скрытое поле для передачи user_id -->
        <input type="hidden" name="user_id" value="12345">

        <!-- Кнопка отправки -->
        <button type="submit">Отправить</button>
    </form>

@endsection

@section('location')
    @include('new.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/new/images/logo.png'])
@endsection
