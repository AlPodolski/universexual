@php
    /* @var $post \App\Models\Post} */
@endphp

<div class="page-review-item col-3">

    <div class="img-name-wrap d-flex">
        <a href="/individualka/{{ $post->url }}">
            <img src="/104-120/thumbs/{{ $post->avatar }}" alt="" loading="lazy">
        </a>

        <a href="/individualka/{{ $post->url }}" class="page-review-name">{{ $post->name }}, {{ $post->age }}</a>
    </div>

    <div class="review-author-wrap">
        <div class="page-review-text">
            {{ $item->text }}
        </div>
        <div class="d-flex">
            <div class="page-review-author">{{ $item->name }}</div>
        </div>

    </div>

</div>
