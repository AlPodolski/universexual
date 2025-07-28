@php
    /* @var $post \App\Models\Post */
@endphp

<div class="profile-card">

    <a class="profile-image" href="/post/{{ $post->url }}">
        <img @if(isset($i) and $i > 0) loading="lazy" @endif src="/thumbnail/300-400{{ $post->avatar }}"
             alt="{{ $post->name }} красивая индивидуалка из {{ $post->city->city2 }} цена от {{ $post->price }} руб">
    </a>

    <div class="profile-info">
        <a href="/post/{{ $post->url }}" class="profile-name">{{ $post->name }}, {{ $post->age }}</a>
        @if($metro = $post->metro->first())
            <div class="profile-location">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="11" stroke="white" stroke-width="2"/>
                    <path d="M6 17V7H8.5L12 13L15.5 7H18V17H16V11L13 17H11L8 11V17H6Z" fill="white"/>
                </svg>
                {{ $metro->metro_value }}
            </div>
        @endif
        <div class="profile-rates">
            <div class="rate-item">
                <div class="rate-value">час {{ $post->price }} ₽</div>
            </div>
        </div>
        <div class="profile-stats">
            <div class="stat-item">
                <div class="stat-value">{{ $post->breast }}</div>
                <div class="stat-label">Грудь</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $post->ves }}</div>
                <div class="stat-label">Вес</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $post->rost }}</div>
                <div class="stat-label">Рост</div>
            </div>
        </div>
        <div class="profile-actions">
            <a href="tel:+{{ $post->phone }}" class="action-btn primary">Позвонить</a>
            <a href="/post/{{ $post->url }}" class="action-btn secondary">Детали</a>
        </div>
    </div>
</div>
