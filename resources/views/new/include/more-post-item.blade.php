<div class="profile-main__sim-item">
    <a href="/user/{{ $item->url }}" class="profile-main__sim-item-photo">
        <img src="/252-309/thumbs/{{$item->avatar}}" alt="">
    </a>
    <div class="profile-main__sim-item-name item-name">
        <a href="/user/{{ $item->url }}" class="item-name__text profile-main__sim-title-item-name-text">
            {{ $item->name }}
        </a>
    </div>
    @if($metro = $item->metro->first())
        <div class="profile-main__sim-item-location metro">
            <svg class="metro__icon">
                <use xlink:href='/svg/dest/stack/sprite.svg#metro'></use>
            </svg>
            <a href="/{{ $metro->metro_url }}" class="metro__text">
                {{ $metro->metro_value }}
            </a>
        </div>
    @endif
</div>
