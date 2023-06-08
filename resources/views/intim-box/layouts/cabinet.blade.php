<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/intim-box/css/cabinet.css?v=12">
</head>

<body>
<div class="wrapper">
    <div class="content">
        <header class="header">
            <div class="container">
                <div class="header__row row">
                    <div class="header__col--logo col-lg-2 col-md-2 col-6">
                        <a href="#" class="header__logo">
                            <img src="/intim-box/images/cabinet/logo.png" alt="" class="header__logo-img">
                        </a>
                    </div>
                    <div class="header__col--burger col-lg-2 col-4">
                        <div class="header__burger">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="header__col--avatar col-lg-1 col-md-2">
                        <!-- Чтобы указать картинку, нужно просто создать тег img без класса, она растянется так как надо. -->
                        <a href="#" class="header__avatar" style="background-color: #4926E8;">
                            АБ
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <sidebar class="sidebar col-lg-3">
                    <div class="sidebar__stats">
                        <div class="sidebar__stats-item">
                            <svg class="sidebar__stats-icon">
                                <use xlink:href='/intim-box/images/cabinet/sprite.svg#wallet'></use>
                            </svg>
                            <div class="sidebar__stats-capt">Баланс:</div>
                            <div class="sidebar__stats-result">
                                {{ auth()->user()->cash }}р
                            </div>
                            <a class="sidebar__stats-walletadd" href="/cabinet/pay">
                            </a>
                        </div>
                        <div class="sidebar__stats-item">
                            <svg class="sidebar__stats-icon">
                                <use xlink:href='/intim-box/images/cabinet/sprite.svg#rate'></use>
                            </svg>
                            <div class="sidebar__stats-capt">Расход в час:</div>
                            <div class="sidebar__stats-result">
                            </div>
                        </div>
                        <div class="sidebar__stats-item">
                            <div class="sidebar__stats-capt">Хватит на N часов (дней)</div>
                            <div class="sidebar__stats-result">
                            </div>
                        </div>
                        <a class="btn-main sidebar__stats-button" href="/cabinet/pay">
                            Пополнить баланс
                        </a>
                    </div>
                    <div class="sidebar__menu">
                        <nav class="sidebar__menu-nav">
                            <ul class="sidebar__menu-list">
                                <li class="sidebar__menu-item">
                                    <a href="/cabinet/post/create" class="sidebar__menu-link">
                                        <svg class="sidebar__menu-icon">
                                            <use xlink:href='/intim-box/images/cabinet/sprite.svg#user'></use>
                                        </svg>
                                        <span class="sidebar__menu-text">
                            Добавить анкету
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="/cabinet" class="sidebar__menu-link">
                                        <svg class="sidebar__menu-icon">
                                            <use xlink:href='/intim-box/images/cabinet/sprite.svg#user-card'></use>
                                        </svg>
                                        <span class="sidebar__menu-text">
                            Мои анкеты (0/3)
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="#" class="sidebar__menu-link">
                                        <img src="/intim-box/images/cabinet/icons/nount-rate.svg" alt="" class="sidebar__menu-icon">
                                        <span class="sidebar__menu-text">
                            Тарифы
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="#" class="sidebar__menu-link">
                                        <svg class="sidebar__menu-icon">
                                            <use xlink:href='/intim-box/images/cabinet/sprite.svg#feedback'></use>
                                        </svg>
                                        <span class="sidebar__menu-text">
                            Обратная связь
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="#" class="sidebar__menu-link">
                                        <img src="/intim-box/images/cabinet/icons/invoice.svg" alt="" class="sidebar__menu-icon">
                                        <span class="sidebar__menu-text">
                            История платежей
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="#" class="sidebar__menu-link">
                                        <svg class="sidebar__menu-icon">
                                            <use xlink:href='/intim-box/images/cabinet/sprite.svg#instruction'></use>
                                        </svg>
                                        <span class="sidebar__menu-text">
                            Инструкция
                        </span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a href="#" class="sidebar__menu-link">
                                        <svg class="sidebar__menu-icon">
                                            <use xlink:href='/intim-box/images/cabinet/sprite.svg#out'></use>
                                        </svg>
                                        <span class="sidebar__menu-text">
                            Выйти
                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </sidebar>

                <main class="main col-lg-9">
                    @yield('content')
                </main>

            </div>
        </div>
    </div>

    <footer class="footer">

    </footer>

    <div class="mobile-menu">
        <div class="mobile-menu__inner">
            <a class="mobile-menu__ui">
                Анна Бородач
                <svg class="mobile-menu__ui-icon">
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#arrow-down'></use>
                </svg>
            </a>
        </div>
    </div>

</div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9c9066f4-2079-4b71-b871-46dbea21ece3"
        type="text/javascript"></script>
<script defer src="/intim-box/js/cabinet.js?v=17"></script>
</body>

</html>
