@extends('intim-box.layouts.cabinet')

@section('title', 'Кабинет')

@section('content')
    <div class="none-ankets">
        <h2 class="none-ankets__title">
            У вас нет добавленных </br>
            <img src="/intim-box/images/cabinet/notfound-ankets.png" alt="">анкет
        </h2>
        <a href="/cabinet/post/create" class="none-ankets__btn btn-main">
            Добавить анкету
        </a>
    </div>
@endsection
