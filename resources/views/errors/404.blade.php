@extends(PATH.'.layouts.main')

@section('title', '404')
@section('des', '404')

@section('content')

    <nav class="breadcrumbs">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item">
                <a href="/" class="breadcrumbs__link link-reset">
                    Главная
                </a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__link link-reset">
                404
            </li>
        </ul>
    </nav>

    <h1>404</h1>

    <p>Неправильно набран адрес или такой страницы не существует на сайте</p>

    <a href="/">На главную</a>

@endsection
