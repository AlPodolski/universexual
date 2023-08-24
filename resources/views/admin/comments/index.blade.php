@extends('layouts.app')

@section('title', 'Комментарии')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текс</th>
            <th scope="col">Автор</th>
            <th scope="col">Статус</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)

            @foreach($comments as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->text }}
                    </td>
                    <td>
                        <a target="_blank" href="/post/{{ $post->post->url }}">
                            @if(isset($post->post->avatar) and $post->post->avatar)
                                <img loading="lazy" src="/139-185/thumbs/{{$post->post->avatar}}" alt="">
                            @endif
                        </a>
                    </td>
                    <td>
                        @if($post->status == \App\Models\Review::MODERATION_STATUS)
                            <div data-id="{{ $post->id }}"
                                 data-url="/admin/comments/check"
                                 onclick="checkComment(this)" class="delete">Подтвердить</div>
                        @else
                            Подтверждено
                        @endif
                    </td>
                    <td>
                        <div data-id="{{ $post->id }}"
                             onclick="deleteComment(this)"
                             class="delete">Удалить</div>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($comments->total() > $comments->count())

        {{ $comments->links() }}

    @endif

@endsection
