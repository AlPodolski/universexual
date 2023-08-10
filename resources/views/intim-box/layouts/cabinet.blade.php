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

                @yield('content')

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
<script defer src="/intim-box/js/cabinet.js?v=17"></script>
</body>

</html>
