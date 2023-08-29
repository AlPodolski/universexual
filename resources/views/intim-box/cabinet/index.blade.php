@extends('intim-box.layouts.cabinet')

@section('title', 'Кабинет')

@section('content')

    @include('intim-box.cabinet.include.sidebar')

    <main class="main col-lg-9">
        @if($posts->first())
            <span onclick="start_all(this)" class="start-all ankets__item-moder">Включить все анкеты</span>
            <div class="ankets__items">



                @foreach($posts as $post)
                    @include('intim-box.cabinet.include.post')
                @endforeach

            </div>

        @else

            <div class="none-ankets">
                <h2 class="none-ankets__title">
                    У вас нет добавленных </br>
                    <img src="/intim-box/images/cabinet/notfound-ankets.png" alt="">анкет
                </h2>
                <a href="/cabinet/post/create" class="none-ankets__btn btn-main">
                    Добавить анкету
                </a>
            </div>

        @endif
    </main>

@endsection
