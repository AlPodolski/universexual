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

    @include('new.include.filter')

    <div class="row">
        <div class="col-12">
            <h1 class="big-red-text">{{ $meta['h1'] }}</h1>
            <p class="small-black-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>
    <div class="row posts">

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

    @if($posts and $posts->total() > $posts->count())

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
             class="more-posts-btn">Показать еще
        </div>

        {!! str_replace('http', 'https', $posts->links('vendor.pagination.bootstrap-4')) !!}
    @endif

    @include('new.include.main-menu', compact('data'))

@endsection

@section('location')
    @include('new.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/new/images/logo.png'])
@endsection
