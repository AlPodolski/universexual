@extends('layouts.app')

@section('title', 'Анкеты')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Откуда</th>
            <th scope="col">Куда</th>
            <th scope="col">Сайт</th>
        </tr>
        </thead>

        <tbody>

        @if($redirects)

            @foreach($redirects as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->from }}
                    </td>
                    <td>
                        {{ $post->to }}
                    </td>
                    <td>{{ $post->site }}</td>
                </tr>
            @endforeach

        @endif

        </tbody>

    </table>

    @if($redirects->total() > $redirects->count())
        {{ $redirects->links('vendor.pagination.bootstrap-4') }}
    @endif

@endsection
