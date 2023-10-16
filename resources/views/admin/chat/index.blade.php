@extends('layouts.app')

@section('title', 'Чат')

@section('content')

    @include('admin.include.nav')

    <main class=" chat admin-chat">
        @include('intim-box.cabinet.include.message')


        <div class="chat__list">

            @foreach($chatList as $chatItem)

                @if(isset($chatItem->last->status ) and $chatItem->last->status == \App\Models\ChatMessage::NOT_READ_STATUS)

                    <div class="chat__list-item" data-id="{{ $chatItem->chat_id }}" onclick="getChat(this)">
                        <div class="chat__list-item-name">
                            {{ $chatItem->user->name }}
                        </div>

                        <div
                            class="message-text @if($chatItem->last->status == \App\Models\ChatMessage::NOT_READ_STATUS) not-read @endif ">{{ $chatItem->last->message }}</div>

                    </div>

                @endif

            @endforeach

            @foreach($chatList as $chatItem)

                <div class="chat__list-item" data-id="{{ $chatItem->chat_id }}" onclick="getChat(this)">
                    <div class="chat__list-item-name">
                        {{ $chatItem->user->name }}
                    </div>

                    <div
                        class="message-text @if(isset($chatItem->last->status ) and $chatItem->last->status == \App\Models\ChatMessage::NOT_READ_STATUS) not-read @endif ">{{ $chatItem->last->message }}</div>

                </div>

            @endforeach

        </div>

        <div class="chat__dialog">

        </div>
    </main>

@endsection
