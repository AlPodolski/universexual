@extends('intim-box.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif

    <div class="catalog__body">

        @include('intim-box.include.breadcrumb' , ['title' => $meta['h1']])

        <div class="catalog-descr">
            <h1 class="catalog-descr__title">
                {{ $meta['h1'] }}
            </h1>
        </div>

        <div class="count-post-find breadcrumbs__link">
            Найдено анкет: {{ $posts->total() }}
        </div>

        @if(isset($data['current_metro']))

            <div class="metro-map">

                <div class="show-metro-map" onclick="show_metro_map()">
                    Показать на карте
                </div>

            </div>

            <div id="map" data-x="{{$data['current_metro']->x}}" data-y="{{$data['current_metro']->y}}"></div>

        @endif

        <div class="catalog-items">
            @php
                $i = 0;
            @endphp
            @foreach($posts as $post)
                @include('intim-box.include.item')
                @php
                    $i ++;
                @endphp
            @endforeach

        </div>
        @if($posts->total() > $posts->count())
            {{ $posts->links('intim-box.vendor.pagination.bootstrap-4') }}
        @endif
    </div>
@endsection

@section('main-menu')
    @include('intim-box.include.main-menu', compact('data'))
@endsection

@section('location')
    @include('intim-box.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('intim-box.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/intim-box/images/logo.png'])
@endsection
