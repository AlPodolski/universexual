@extends('intim-box.layouts.cabinet')

@section('title', 'Обратная связь')

@section('content')

    @include('intim-box.cabinet.include.sidebar')

    <main class="main chat col-lg-9">
        @include('intim-box.cabinet.include.message')
        <div class="chat__dialog">


            <div class="chat__dialog-name">
                Служба поддержки
            </div>

            <div class="chat__dialog-list-wrap">


                <div class="chat__dialog-list">

                    @if($chat and $chat->message->count())

                        @foreach($chat->message as $item)
                            <div class="chat__dialog-list-item @if($item->from == auth()->user()->id) chat__dialog-list-item--qst @else chat__dialog-list-item--ans @endif
                                ">
                                <div class="chat__dialog-list-item-text">{{ $item->message }}</div>
                                <div
                                    class="chat__dialog-list-item-date">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}</div>
                            </div>

                        @endforeach

                    @else

                        <div class="chat__dialog-list-item chat__dialog-list-item--ans">
                            <div class="chat__dialog-list-item-text">
                                Опишите проблему и мы ответим
                            </div>
                        </div>

                    @endif


                </div>

            </div>

            <form action="#" class="chat__dialog-panel">
                <textarea name="chatMessage" class="chatMessage" placeholder="Напишите сообщение..."></textarea>
                <label for="chatFile">
                    <svg>
                        <use xlink:href='svg/dest/stack/sprite.svg#addFile'></use>
                    </svg>
                </label>
                <input type="file" name="chatFile" id="chatFile">
                <div onclick="sendMessage(this)"
                     class="btn-main">Отрправить
                </div>
            </form>
        </div>
    </main>

@endsection
