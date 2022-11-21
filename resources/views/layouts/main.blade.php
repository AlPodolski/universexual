<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('des')">

    @if(View::hasSection('can'))
        <link rel="canonical" href="@yield('can')">
        <meta name="robots" content="noindex, follow">
    @endif

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</head>
<body>
<header>
    <div class="top-header">
        <div class="container">
            <div class="d-flex top-header-items-wrap">
                <div class="logo">
                    <a href="/"><img src="/img/logo.webp" alt=""></a>
                </div>
                <div class="search">
                    <form action="/poisk" class="search-form position-relative">
                        @csrf
                        <input type="text" class="text-input" name="name">
                        <button class="yellow-btn position-absolute" type="submit">Поиск</button>
                    </form>
                </div>
                <div class="top-nav">
                    <div class="top-nav-list">
                        <a href="#">Кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('main-menu')

</header>
<main>
    <div class="content-wrap">
        <div class="container">
            @yield('content')
        </div>
    </div>
</main>
</body>
</html>
