<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/intim-box/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/intim-box/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/intim-box/icons/favicon-16x16.png">
    <link rel="icon" href="/intim-box/icons/favicon.svg" type="image/svg+xml">
    <link rel="manifest" href="/intim-box/icons/site.webmanifest">
    <link rel="mask-icon" href="/intim-box/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="theme-color" content="#ffffff">
    <meta name="googlebot" content="max-snippet:-1">
    <!-- CSRF Token -->
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

    <link rel="stylesheet" href="/intim-box/css/style.css?v=13">
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
                    <div class="favorite">
                        <a href="/favorite">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="22" x="0" y="0"
                                 viewBox="0 0 471.701 471.701" style="enable-background:new 0 0 512 512"
                                 xml:space="preserve" class=""><g>
                                    <path
                                        d="M433.601 67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7 13.6-92.4 38.3l-12.9 12.9-13.1-13.1c-24.7-24.7-57.6-38.4-92.5-38.4-34.8 0-67.6 13.6-92.2 38.2-24.7 24.7-38.3 57.5-38.2 92.4 0 34.9 13.7 67.6 38.4 92.3l187.8 187.8c2.6 2.6 6.1 4 9.5 4 3.4 0 6.9-1.3 9.5-3.9l188.2-187.5c24.7-24.7 38.3-57.5 38.3-92.4.1-34.9-13.4-67.7-38.1-92.4zm-19.2 165.7-178.7 178-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3s10.7-53.7 30.3-73.2c19.5-19.5 45.5-30.3 73.1-30.3 27.7 0 53.8 10.8 73.4 30.4l22.6 22.6c5.3 5.3 13.8 5.3 19.1 0l22.4-22.4c19.6-19.6 45.7-30.4 73.3-30.4 27.6 0 53.6 10.8 73.2 30.3 19.6 19.6 30.3 45.6 30.3 73.3.1 27.7-10.7 53.7-30.3 73.3z"
                                        fill="#ffffff" data-original="#000000"></path>
                                </g></svg>
                        </a>
                    </div>
                    <div class="header__ui header__col">
                        <button class="header__ui-search btn d-none">
                            <svg class="header__ui-search-icon">
                                <use xlink:href='/svg/dest/stack/sprite.svg#search'></use>
                            </svg>
                        </button>
                        <button class="header__ui-add btn d-none">
                            Добавить анкету
                        </button>
                        <div class="header__ui-cabinet">
                            @guest()
                                <a href="/login" class="header__ui-cabinet-link link-reset">
                                    Вход
                                </a>
                                <a href="/register" class="header__ui-cabinet-link link-reset">
                                    Регистрация
                                </a>
                            @endguest
                            @auth()
                                <a href="/cabinet" class="header__ui-cabinet-link link-reset">
                                    Кабинет
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div id="arrowTop" hidden></div>
                <div class="row">
                    @if(View::hasSection('main-menu'))
                        @yield('main-menu')
                    @endif
                    <div class="catalog">
                        <div itemscope itemtype="http://schema.org/SiteNavigationElement" class=" main-top-menu">
                            <meta itemprop="name" content="Навигационное Меню">
                            <ul class=" main-top-menu__list">
                                <li class="main-top-menu__item">
                                    <a itemprop="url" href="/individualki" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#home"></use>
                                        </svg>
                                        <span itemprop="name">Индивидуалки</span>

                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a itemprop="url" href="/proverennye" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#verif"></use>
                                        </svg>
                                        <span itemprop="name">Проверенные</span>

                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a itemprop="url" href="/novye" class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#new"></use>
                                        </svg>
                                        <span itemprop="name">Новые</span>

                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a itemprop="url" href="/deshevye-prostitutki"
                                       class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#money"></use>
                                        </svg>
                                        <span itemprop="name">Дешевые</span>

                                    </a>
                                </li>
                                <li class="main-top-menu__item">
                                    <a itemprop="url" href="/dorogie-prostitutki"
                                       class="main-top-menu__link link-reset">
                                        <svg class="main-top-menu__icon">
                                            <use xlink:href="/svg/dest/stack/sprite.svg#crown"></use>
                                        </svg>
                                        <span itemprop="name">Элитные</span>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="alert">Скажите что звоните с сайте intim-box.com и получите скидку</div>
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
                        «© {{ date('Y') }} INTIM-BOX»
                        Администрация не несет ответственности за размещенную пользователями информацию.
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
                </div>

            </div>
        </div>
    </footer>
</div>

<div class="mobile-menu mobile-menu_main" data-menu>
    <div class="mobile-menu__header">

    </div>
</div>
<script defer src="/intim-box/js/script.js?v=1"></script>
@if(View::hasSection('yandex_script'))
    <script defer src="@yield('yandex_script')"></script>
@endif
<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        for (var j = 0; j < document.scripts.length; j++) {
            if (document.scripts[j].src === r) {
                return;
            }
        }
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(92632574, "init", {clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true}); </script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/92632574" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript> <!-- /Yandex.Metrika counter -->
</body>

</html>
