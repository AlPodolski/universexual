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
            <div class="chat__dialog-list">
                <div class="chat__dialog-list-item chat__dialog-list-item--ans">
                    <div class="chat__dialog-list-item-text">
                        Опишите проблему и мы ответим
                    </div>
                    <div class="chat__dialog-list-item-date">
                        15:45
                    </div>
                </div>
                <div class="chat__dialog-list-item chat__dialog-list-item--qst">
                    <div class="chat__dialog-list-item-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    </div>
                    <div class="chat__dialog-list-item-date">
                        15:45
                    </div>
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
                        class="btn-main">Отрправить</div>
            </form>
        </div>
    </main>

@endsection
