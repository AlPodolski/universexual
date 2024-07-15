@extends('new.layouts.main')
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

    @include('new.include.main-menu', compact('data'))

    <div class="catalog">

        @include('new.include.top-menu')

        <div class="catalog__body">

            @include('new.include.filter' , compact('data'))

            <div class="catalog-descr">
                <h2 class="catalog-descr__title">
                    {{ $meta['h1'] }}
                </h2>
            </div>
            <div class="catalog-items">
                @php
                    $i = 0;
                @endphp

                @if($posts)
                    @foreach($posts as $post)
                        @include('new.include.item')
                        @php
                            $i ++;
                        @endphp
                    @endforeach
                @endif

            </div>
            <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
                 class="get-more get-more-post-btn">Показать еще
            </div>
            @if($posts and $posts->total() > $posts->count())
                {!! str_replace('http', 'https', $posts->links('new.vendor.pagination.bootstrap-4')) !!}
            @endif

        </div>

    </div>

@endsection

@section('location')
    @include('new.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/new/images/logo.png'])
@endsection
