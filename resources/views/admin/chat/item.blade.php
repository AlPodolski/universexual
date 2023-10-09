<div class="chat__dialog-list-wrap">
    <div class="chat__dialog-list">
        @foreach($chat->message as $item)
            <div
                class="chat__dialog-list-item @if($item->from == 0) chat__dialog-list-item--qst @else chat__dialog-list-item--ans @endif
            ">
                <div class="chat__dialog-list-item-text">
                    {{ $item->message }}
                </div>
                <div class="chat__dialog-list-item-date">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}
                </div>
            </div>
        @endforeach
    </div>
</div>


<form action="#" class="chat__dialog-panel">
    <textarea name="chatMessage" class="chatMessage" placeholder="Напишите сообщение..."></textarea>
    <label for="chatFile">
        <svg>
            <use xlink:href='svg/dest/stack/sprite.svg#addFile'></use>
        </svg>
    </label>
    <div onclick="sendMessage(this)" data-id="{{ $chat->chat_id }}"
         class="btn-main">Отрправить
    </div>
</form>
