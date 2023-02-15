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

    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif

    <div class="catalog__body">

        <div class="catalog-descr">
            <h1 class="catalog-descr__title">
                {{ $meta['h1'] }}
            </h1>

            @if($data['current_city']->id == 1 and request()->path() == '/')
                <p class="catalog-descr__text">
                    Незаменимые и лучшие проститутки Москвы — это мечта каждого мужчины, как местного,
                    так и гостя столицы. Наш сервис призван решить проблему быстрого и удобного поиска
                    шлюх по всем параметрам: от цены до предоставляемых услуг. Наш каталог анкет с
                    настоящими фото и разнообразными ценниками поможет вам сделать правильных и легкий выбор!
                </p>
            @endif
        </div>
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
            {!! str_replace('http', 'https', $posts->links('intim-box.vendor.pagination.bootstrap-4')) !!}
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
