<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta name="HandheldFriendly" content="True">

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

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">
    <link rel="stylesheet" href="/css/style.css?v=1">

</head>

<body>

<header class="d-flex">
    <div class="container">
        <div class="row">
            <div class="col-2 col-lg-5 d-flex align-items-center" onclick="openPanelMenu();">
                <div class="catalog-btn-wrap d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z" fill="white"/>
                    </svg>
                    <div class="catalog-text">Каталог</div>
                </div>
            </div>
            <div class="col-8 col-lg-2 d-flex align-items-center">
                <div class="logo">
                    <a href="/"><img src="/images/logo.svg" alt=""></a>
                </div>
            </div>
            <div class="col-2 col-lg-5 d-flex align-items-center">
                <form id="search-name" action="/search" method="get" class="position-relative">
                    @csrf
                    <input type="text" placeholder="Поиск" name="name">
                    <button type="submit" class="position-absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M15.5 14H14.71L14.43 13.73C15.055 13.004 15.5117 12.1488 15.7676 11.2256C16.0234 10.3025 16.0721 9.33416 15.91 8.39001C15.44 5.61001 13.12 3.39001 10.32 3.05001C9.33562 2.92547 8.33579 3.02778 7.39703 3.34909C6.45827 3.67041 5.60545 4.20222 4.90384 4.90384C4.20222 5.60545 3.67041 6.45827 3.34909 7.39703C3.02778 8.33579 2.92547 9.33562 3.05001 10.32C3.39001 13.12 5.61001 15.44 8.39001 15.91C9.33416 16.0721 10.3025 16.0234 11.2256 15.7676C12.1488 15.5117 13.004 15.055 13.73 14.43L14 14.71V15.5L18.25 19.75C18.66 20.16 19.33 20.16 19.74 19.75C20.15 19.34 20.15 18.67 19.74 18.26L15.5 14ZM9.50001 14C7.01 14 5.00001 11.99 5.00001 9.50001C5.00001 7.01 7.01 5.00001 9.50001 5.00001C11.99 5.00001 14 7.01 14 9.50001C14 11.99 11.99 14 9.50001 14Z"
                                fill="#FF005C"/>
                        </svg>
                    </button>
                </form>
                <a href="" class="cabinet-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                        <path
                            d="M32.9219 22.9688C32.9219 24.6344 32.4279 26.2627 31.5025 27.6477C30.5771 29.0327 29.2618 30.1121 27.7229 30.7495C26.184 31.387 24.4907 31.5538 22.857 31.2288C21.2233 30.9038 19.7227 30.1017 18.5448 28.9239C17.367 27.7461 16.5649 26.2455 16.24 24.6118C15.915 22.9781 16.0818 21.2847 16.7192 19.7458C17.3566 18.2069 18.4361 16.8916 19.8211 15.9662C21.206 15.0408 22.8343 14.5469 24.5 14.5469C26.7336 14.5469 28.8758 15.4342 30.4552 17.0136C32.0346 18.593 32.9219 20.7351 32.9219 22.9688ZM44.4063 24.5C44.4063 28.4371 43.2388 32.2858 41.0514 35.5593C38.8641 38.8329 35.7552 41.3843 32.1178 42.891C28.4804 44.3976 24.4779 44.7918 20.6165 44.0238C16.7551 43.2557 13.2081 41.3598 10.4242 38.5758C7.64023 35.7919 5.74434 32.245 4.97625 28.3835C4.20816 24.5221 4.60238 20.5196 6.10903 16.8822C7.61569 13.2448 10.1671 10.1359 13.4407 7.94856C16.7143 5.76123 20.5629 4.59375 24.5 4.59375C29.7764 4.60387 34.8337 6.70438 38.5647 10.4353C42.2956 14.1663 44.3961 19.2236 44.4063 24.5ZM41.3438 24.5C41.3448 21.772 40.6831 19.0845 39.4158 16.6687C38.1484 14.2529 36.3133 12.1811 34.0681 10.6315C31.8229 9.08181 29.235 8.10066 26.5268 7.77241C23.8185 7.44415 21.0711 7.77861 18.5207 8.74702C15.9704 9.71543 13.6934 11.2888 11.8856 13.3319C10.0778 15.3749 8.79328 17.8265 8.14252 20.4758C7.49176 23.1251 7.49422 25.8928 8.14969 28.5409C8.80517 31.189 10.094 33.6383 11.9055 35.6781C13.145 33.9001 14.7423 32.4006 16.5949 31.2758C18.7221 33.3137 21.5542 34.4514 24.5 34.4514C27.4459 34.4514 30.2779 33.3137 32.4051 31.2758C34.2578 32.4006 35.855 33.9001 37.0945 35.6781C39.8367 32.601 41.3494 28.6217 41.3438 24.5Z"
                            fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>

<main>

    <div class="container">

        @yield('content')

    </div>

</main>

<script defer src="/js/jquery-3.5.1.min.js"></script>
<script defer src="/js/bootstrap.bundle.min.js"></script>
<script defer src="/js/nouislider.min.js"></script>
<script src="/js/wNumb.min.js" defer></script>
<script defer src="/js/script.js?v=1"></script>
@if(View::hasSection('yandex_script'))
    <script defer src="@yield('yandex_script')"></script>
@endif
</body>

</html>
