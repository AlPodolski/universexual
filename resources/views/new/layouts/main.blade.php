<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('des')">

    @if(View::hasSection('can'))
        <link rel="canonical" href="@yield('can')">
        <meta name="robots" content="index, follow">
    @endif

    @if(View::hasSection('webmaster'))
        <meta name="yandex-verification" content="@yield('webmaster')">
    @endif

    @if(View::hasSection('open-graph'))
        @yield('open-graph')
    @endif

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('des')" />
    <meta property="og:url" content="{{ $_SERVER['REQUEST_URI'] }}" />

    @hasSection('open_img')
        <meta property="og:image" content="@yield('open_img') " />
    @else
        <meta property="og:image" content="/img/logo.svg" />
    @endif

    @hasSection('preload_img')
        @yield('preload_img')
    @endif

    <meta property="og:site_name" content="universal-lady.com" />
    <meta property="og:locale" content="ru_RU" />
    <link rel="stylesheet" href="/css/style.css?v=11">
</head>
<body>
<!-- Header -->
<header class="header">
    <div class="container">
        <div class="header-content">
            <a href="/" class="logo">

                <img src="/img/lips.svg" id="left-logo-img" alt="">
                <img src="/img/logo.png" alt="">

            </a>
            <form action="/name" class="search-bar">
                @csrf
                <input type="text" name="name" placeholder="Поиск">
                <button type="submit">🔍</button>
            </form>
            <div class="auth-buttons">
                <a href="#" class="btn btn-primary">Кабинет</a>
            </div>
            <div class="burger" id="burger">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="22" viewBox="0 0 30 22" fill="none">
                    <rect width="30" height="4" rx="2" fill="white"/>
                    <rect y="9" width="30" height="4" rx="2" fill="white"/>
                    <rect y="18" width="30" height="4" rx="2" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="main-layout">

        @yield('catalog')

        @yield('content')

    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>💋 UniverseIndy</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="footer-section">
                <h3>Размещение</h3>
                <a href="#">Подключения</a>
                <a href="#">Пошаговое</a>
                <a href="#">Разное</a>
                <a href="#">Условия</a>
            </div>
            <div class="footer-section">
                <h3>С нами</h3>
                <a href="#">Интим-салоны</a>
                <a href="#">Массажисты</a>
                <a href="#">Интим-карты</a>
            </div>
            <div class="footer-section">
                <h3>Обращайтесь на почту по всем интересующим вопросам</h3>
                <a href="mailto:info@universeindy.ru">📧 info@universeindy.ru</a>
            </div>
        </div>
    </div>
</footer>
<script defer src="/js/script.js?v=1"></script>
</body>
</html>
