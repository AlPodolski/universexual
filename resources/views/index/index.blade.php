@extends('layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')
    @include('include.filter' , compact('data'))
    @if($productMicro)
        {!! $productMicro !!}
    @endif
    <h1>{{ $meta['h1'] }}</h1>

    @include('include.limit_and_order')

    <div class="content d-flex" id="content">
        @foreach($posts as $post)
            @include('include.item', compact('post'))
        @endforeach
    </div>

    @if($posts->total() > $posts->count())
        <div data-url="{{ str_replace('http', 'http', $posts->nextPageUrl()) }}"
             onclick="getMorePosts(this)"
             class="get-more yellow-btn get-more-post-btn">Показать еще
        </div>
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection

@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection
