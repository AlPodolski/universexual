<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/intim-box/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/intim-box/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/intim-box/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/intim-box/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/intim-box/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/intim-box/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/intim-box/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/intim-box/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/intim-box/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/intim-box/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/intim-box/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/intim-box/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/intim-box/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/intim-box/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/intim-box/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('des')">

    @if(View::hasSection('can'))
        <link rel="canonical" href="@yield('can')">
        <meta name="robots" content="noindex, follow">
    @endif

    @if(View::hasSection('webmaster'))
        <meta name="yandex-verification" content="@yield('webmaster')">
    @endif

    @if(View::hasSection('open-graph'))
        @yield('open-graph')
    @endif

    <link rel="stylesheet" href="{{ asset('intim-box/css/style.css?v=2') }}">
</head>

<body>
<div class="wrapper">
    <div class="content">
        <header class="header">
            <div class="container">
                <div class="row header__row">
                    <div class="header__mob-menu header__col">
                        <div class="burger-menu" data-menu-btn>
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="header__logo header__col">
                        <a href="/">
                            <svg class="header__logo-img">
                                <use xlink:href='/svg/dest/stack/sprite.svg#logo'></use>
                            </svg>
                        </a>
                    </div>
                    @if(View::hasSection('location'))
                        @yield('location')
                    @endif
                    <div class="header__ui header__col">
                        <button class="header__ui-search btn d-none">
                            <svg class="header__ui-search-icon">
                                <use xlink:href='/svg/dest/stack/sprite.svg#search'></use>
                            </svg>
                        </button>
                        <button class="header__ui-add btn d-none">
                            Добавить анкету
                        </button>
                        <div class="header__ui-cabinet d-none">
                            <a href="#" class="header__ui-cabinet-link link-reset">
                                Вход
                            </a>
                            <a href="#" class="header__ui-cabinet-link link-reset">
                                Регистрация
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    @if(View::hasSection('main-menu'))
                        @yield('main-menu')
                    @endif
                    <div class="catalog">
                        <div class=" main-top-menu">
                            <ul class=" main-top-menu__list">
                                <li class="main-top-menu__item">
                                    <a href="/individualki" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#home"></use>
                                        </svg>
                                        Индивидуалки
                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a href="/proverennye" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#verif"></use>
                                        </svg>
                                        Проверенные
                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a href="/novye" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#new"></use>
                                        </svg>
                                        Новые
                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a href="/deshevye-prostitutki" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#money"></use>
                                        </svg>
                                        Дешевые
                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a href="/dorogie-prostitutki" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#crown"></use>
                                        </svg>
                                        Элитные
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row footer__row">
                <div class="footer__about footer__col">
                    <a href="/">
                        <svg class="footer__about-logo">
                            <use xlink:href='/svg/dest/stack/sprite.svg#logo'></use>
                        </svg>
                    </a>
                    <p class="footer__about-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.
                    </p>
                </div>
                <div class="footer__menu footer__col">
                    <ul class="footer__menu-list">
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/individualki">
                                Индивидуалки
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/proverennye">
                                Проверенные
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/novye">
                                Новые
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/deshevye-prostitutki">
                                Дешевые
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/dorogie-prostitutki">
                                Элитные
                            </a>
                        </li>
                    </ul>
                    <ul class="footer__menu-list">
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/video">
                                С видео
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/intim-salony">
                                Интим-салоны
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/eroticeskii-massaz">
                                Массажистки
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link link-reset" href="/intim-karta">
                                Интим-карта
                            </a>
                        </li>
                        <li class="footer__menu-item">
                        </li>
                    </ul>
                </div>
                <div class="footer__mail footer__col">
                    <p class="footer__mail-descr">
                        Обращайтесь на почту по всем интересующим вопрсам
                    </p>
                    <a href="mailto:#" class="footer__mail-link link-reset">
                        <svg class="footer__mail-icon">
                            <use xlink:href="/svg/dest/stack/sprite.svg#mail"></use>
                        </svg>
                        <span>mail.@mail.ru</span>
                    </a>
                </div>

            </div>
        </div>
    </footer>
</div>

<div class="mobile-menu mobile-menu_main" data-menu>
    <div class="mobile-menu__header">

    </div>
</div>
<script defer src="{{ asset('intim-box/js/script.js?v=3') }}"></script>

</body>

</html>
