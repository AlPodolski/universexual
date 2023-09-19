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

        @include('prostitutki_nl.include.filter' , compact('data'))

        <div class="catalog-descr">
            <h1 class="catalog-descr__title">
                {{ $meta['h1'] }}
            </h1>
        </div>

        @include('intim-box.include.link')

        <div class="count-post-find breadcrumbs__link">
            Найдено анкет: {{ $posts->total() }}
        </div>

        @if(isset($data['current_metro']) and $data['current_metro']->x)

            <div class="metro-map">

                <div class="show-metro-map" onclick="ym(92632574,'reachGoal','GET_METRO_MAP');show_metro_map()">
                    Показать на карте
                </div>

            </div>

            <div id="map" class="d-none" style="height: 300px" data-x="{{$data['current_metro']->x}}" data-y="{{$data['current_metro']->y}}"></div>

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

        @if(isset($data['near_metro']))

            <div class="near-metro">
                Посмотрите также анкеты на соседних метро:
                @foreach($data['near_metro'] as $item)
                    <a href="/{{ $item->metro->filter->url }}">{{  $item->metro->value }}</a>
                @endforeach
            </div>

        @endif

        @if($posts->total() > $posts->count())

            <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
                 class="get-more get-more-post-btn">Показать еще
            </div>

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
