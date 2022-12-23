@php
/* @var $post \App\Models\Post */
@endphp
<div class="post">
    <div class="post-content">
        <a class="img-wrap" href="/post/{{ $post->id }}">
            <img
                loading="lazy"
                title="Проститутка {{ $post->name }}"
                srcset="/211-300/thumbs/{{$post->avatar}}" alt="{{ $post->name }}">
        </a>
        <div class="post-info">
            <div class="post-info-item">
                <a href="/post/{{ $post->id }}" class="bold-text">{{ $post->name }}</a>
            </div>
            <div class="post-info-item">
                <span class="bold-text">Рост:</span> {{ $post->rost }}
            </div>
            <div class="post-info-item">
                <span class="bold-text">Вес:</span> {{ $post->ves }}
            </div>
            <div class="post-info-item">
                <span class="bold-text">Грудь:</span> {{ $post->breast }}
            </div>
            <div class="post-info-item">
                <span class="bold-text">Возраст:</span> {{ $post->age }}
            </div>
            <div class="post-info-item bold-text price">
                От {{ $post->price }}р.
            </div>
        </div>
        <div data-phone="{{ $post->phone }}" onclick="phone(this)" class="yellow-btn phone ">Показать телефон</div>
    </div>
</div>
