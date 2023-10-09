@extends('layouts.app')

@section('title', 'Чат')

@section('content')

    @include('admin.include.nav')

    <main class=" chat admin-chat">
        @include('intim-box.cabinet.include.message')


        <div class="chat__list">

            @foreach($chatList as $chatItem)

                <div class="chat__list-item" data-id="{{ $chatItem->chat_id }}" onclick="getChat(this)">
                    <img src="images/chat.png" class="chat__list-item-img" alt="">
                    <span class="chat__list-item-name">
                        {{ $chatItem->user->name }}
                    </span>
                </div>

            @endforeach

        </div>

        <div class="chat__dialog">

        </div>
    </main>

@endsection
