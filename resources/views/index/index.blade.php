@extends('layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif
@section('content')
@include('include.filter' , compact('data'))
    <h1>{{ $meta['h1'] }}</h1>
    <div class="content d-flex">
        @foreach($posts as $post)
            <div class="post">
                <div class="post-content">
                    <a href="/post/{{ $post->id }}">
                        <img
                             loading="lazy"
                             title="Проститутка {{ $post->name }}"
                             srcset="/211-300/thumbs/{{$post->avatar}}" alt="{{ $post->name }}">
                    </a>
                    <div class="post-info">
                        <div class="post-info-item">
                            <a href="/post/{{ $post->id }}" class="bold-text">{{ $post->name }}</a>
                        </div>
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
    @if($posts->total() > $posts->count())
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection
@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection
