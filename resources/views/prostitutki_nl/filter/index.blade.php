@extends('prostitutki_nl.layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif
@section('content')
    @include('prostitutki_nl.include.filter' , compact('data'))
    @include('prostitutki_nl.include.breadcrumb' , ['title' => $meta['h1']])
    <h1>{{ $meta['h1'] }}</h1>
    <div class="content d-flex" id="content">
        @php
            $i = 0;
        @endphp
        @foreach($posts as $post)
            @include('prostitutki_nl.include.item', compact('post'))
            @php
                $i ++;
            @endphp
        @endforeach

    </div>
    @if($posts->total() > $posts->count())
        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}"
             onclick="getMorePosts(this)"
             class="get-more yellow-btn get-more-post-btn">Показать еще
        </div>
        {{ $posts->links('prostitutki_nl.vendor.pagination.bootstrap-4') }}
    @endif
@endsection
@section('main-menu')
    @include('prostitutki_nl.include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('prostitutki_nl.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection

@section('metro-list')
    @include('prostitutki_nl.include.metro-list', compact('data'))
@endsection
