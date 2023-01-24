@extends('prostitutki_nl.layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($webmaster) and $webmaster)
    @section('webmaster', $webmaster['tag'])
@endif

@section('content')
    @include('prostitutki_nl.include.filter' , compact('data'))
    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif
    <h1>{{ $meta['h1'] }}</h1>

    @include('prostitutki_nl.include.limit_and_order')

    <div class="content d-flex" id="content">
        @foreach($posts as $post)
            @include('prostitutki_nl.include.item', compact('post'))
        @endforeach
    </div>

    @if($posts->total() > $posts->count())
        @if(!isset($search))
            <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}"
                 onclick="getMorePosts(this)"
                 class="get-more yellow-btn get-more-post-btn">Показать еще
            </div>
        @endif
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection

@section('main-menu')
    @include('.prostitutki_nl.include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('prostitutki_nl.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection
