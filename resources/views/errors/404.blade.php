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

    <style>
        .error-container {
            text-align: center;
            padding: 40px;
        }
        .error-code {
            font-size: 96px;
            font-weight: bold;
            color: #ff4d4f;
        }
        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error-description {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }
        .error-link {
            display: inline-block;
            background: #ff4d4f;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .error-link:hover {
            background: #e84142;
        }
    </style>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <div class="error-message">Упс! Страница не найдена</div>
        <div class="error-description">Возможно, страница была удалена или вы ошиблись адресом.</div>
        <a href="{{ url('/') }}" class="error-link">Вернуться на главную</a>
    </div>

@endsection
