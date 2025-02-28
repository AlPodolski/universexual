@extends('new.layouts.main')
@section('title', $post['title'])
@section('des', $post['description'])

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

    @if(isset($serviceMicro))
        {!! $serviceMicro !!}
    @endif

    @if(isset($webSiteMicro))
        {!! $webSiteMicro !!}
    @endif

    @if(isset($breadMicro))
        {!! $breadMicro !!}
    @endif
    <div class="col-12">
        <nav class="breadcrumbs">
            <ul class="d-flex">
                <li>
                    <a href="/">
                        Главная
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/blog">
                        Блог
                    </a>
                </li>
                <li class="breadcrumb-item">
                    {{ $post['h1'] }}
                </li>
            </ul>
        </nav>
    </div>

    @include('new.include.filter')

    <div class="row">
        <div class="col-12">
            <div class="h1_sort d-flex">
                <h1 class="big-red-text">{{ $post['h1'] }}</h1>
            </div>
        </div>
    </div>
    <div class="row posts single-blog-post">

        <div class="col-12"><img class="blog-post-img" src="/1300-1300/thumbs{{ $post->image }}" alt=""></div>

        <div class="col-12">
            {!! $post->text !!}
        </div>

    </div>


    @include('new.include.main-menu', compact('data'))

@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $post['title'], 'des' => $post['des'], 'image' => '/images/logo.svg'])
@endsection
