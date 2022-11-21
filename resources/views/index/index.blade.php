@extends('layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])
@section('content')
    <h1>{{ $meta['h1'] }}</h1>
    <div class="content d-flex">
        @foreach($posts as $post)
            <div class="post">
                <div class="post-content">
                    <a href="/post/{{ $post->id }}"><img src="{{ $post->avatar }}" alt=""></a>
                    <div class="post-info">
                        <div class="post-info-item">
                            <span class="bold-text">Рост:</span> {{ $post->rost }}
                        </div>
                        <div class="post-info-item">
                            <span class="bold-text">Вес:</span> {{ $post->ves }}
                        </div>
                        <div class="post-info-item">
                            <span class="bold-text">Грудь:</span> {{ $post->breast }}
                        </div>
                        <div class="post-info-item">
                            <span class="bold-text">Возраст:</span> {{ $post->age }}
                        </div>
                        <div class="post-info-item bold-text price">
                            От {{ $post->price }}р.
                        </div>
                    </div>
                    <div data-phone="{{ $post->phone }}" onclick="phone(this)" class="yellow-btn phone ">Показать телефон</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection
