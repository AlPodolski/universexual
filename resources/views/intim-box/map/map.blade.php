@extends('intim-box.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($webmaster) and $webmaster)
    @section('webmaster', $webmaster['tag'])
@endif
@section('content')
    <div class="catalog__body">
        <h1>{{ $meta['h1'] }}</h1>
        <div class="map-data d-none">
            {!! $posts !!}
        </div>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
        <div id="yandex-map" style="height: 500px">

        </div>
        <script src="{{ asset('js/map.js') }}"></script>
    </div>
@endsection

@section('main-menu')
    @include('intim-box.include.main-menu', compact('data'))
@endsection

@section('location')
    @include('intim-box.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('intim-box.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection
