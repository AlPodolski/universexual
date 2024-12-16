@extends('new.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif

    @include('new.include.filter')

    <div class="row">
        <div class="col-12">
            <h1 class="big-red-text margin-bottom-20">{{ $meta['h1'] }}</h1>
        </div>
    </div>
    <div class="row posts">

        @php
            $i = 0;
            $review = false;
        @endphp

        @if($posts)
            @foreach($posts as $post)
                @include('new.include.item')
                @php
                    $i ++;
                    if ($post->reviews->first()){
                        $review = true;
                    }
                @endphp
            @endforeach
        @endif

    </div>

    @if($review)

        <div class="page-review row">

            <p class="col-12 big-red-text">Отзывы о {{ $meta['h1'] }}</p>

            @foreach($posts as $post)

                @if($post->reviews->first())

                    @foreach($post->reviews as $item)

                        @include('new.include.page-review')

                    @endforeach

                @endif

            @endforeach

        </div>

    @endif

    @if($posts and $posts->total() > $posts->count())

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
             class="more-posts-btn">Показать еще
        </div>

        {!! str_replace('http', 'https', $posts->links('vendor.pagination.bootstrap-4')) !!}
    @endif

    @include('new.include.main-menu', compact('data'))

@endsection

@section('main-menu')
    @include('new.include.main-menu', compact('data'))
@endsection

@section('location')
    @include('new.include.location', compact('data'))
@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/new/images/logo.png'])
@endsection
