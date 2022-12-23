@extends('layouts.main')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif
@section('content')
    @include('include.filter' , compact('data'))
    @include('include.breadcrumb' , ['title' => $meta['h1']])
    <h1>{{ $meta['h1'] }}</h1>
    <div class="content d-flex">
        @foreach($posts as $post)
            @include('include.item', compact('post'))
        @endforeach

    </div>
    @if($posts->total() > $posts->count())
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection
@section('main-menu')
    @include('include.main-menu', compact('data'))
@endsection

@section('open-graph')
    @include('include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/img/logo.svg'])
@endsection
