@extends('layouts.app')

@section('title', 'Анкеты')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото</th>
            <th scope="col">Город</th>
            <th scope="col">Статус</th>
            <th scope="col">П. тлф</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <a target="_blank"
                           href="https://{{ $post->city->url }}.intim-box.com/post/{{ $post->url }}">
                            {{ $post->name }}
                        </a>
                    </td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            @if(isset($post->avatar) and $post->avatar)
                                <img loading="lazy" src="/139-185/thumbs/{{$post->avatar}}" alt="">
                            @endif
                        </a>
                    </td>
                    <td>{{ $post->city->city }}</td>
                    <td>
                        @if($post->publication_status == \App\Models\Post::POST_DONT_PUBLICATION)
                            Не публикуется
                        @endif
                        @if($post->publication_status == \App\Models\Post::POST_ON_PUBLICATION)
                            Публикуется
                        @endif
                        @if($post->publication_status == \App\Models\Post::POST_ON_MODERATION)
                            <div class="check"
                                 data-url="/admin/posts/check"
                                 onclick="check(this)" data-id="{{ $post->id }}">
                                Подтвердить
                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $post->phone_view_count }}
                    </td>
                    <td>
                        <div data-id="{{ $post->id }}" onclick="deletePost(this)" class="delete">Удалить</div>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($posts->total() > $posts->count())

        {{ $posts->links('vendor.pagination.bootstrap-4') }}

    @endif

@endsection
