<div class="profile-main__sim-item">
    <a href="/post/{{ $item->url }}" class="profile-main__sim-item-photo">
        <img src="/252-309/thumbs/{{$item->avatar}}" alt="">
    </a>
    <div class="profile-main__sim-item-name item-name">
        <a href="/post/{{ $item->url }}" class="item-name__text profile-main__sim-title-item-name-text">
            {{ $item->name }}
        </a>
        <img class="item-name__icon profile-main__sim-title-item-name-icon"
             src="/intim-box/images/graphics/catalog-page/diamond.png" alt="">
    </div>
    @if($metro = $item->metro->first())
        <div class="profile-main__sim-item-location metro">
            <svg class="metro__icon">
                <use xlink:href='/intim-box/svg/dest/stack/sprite.svg#metro'></use>
            </svg>
            <div class="metro__text">
                {{ $item->metro_value }}
            </div>
        </div>
    @endif
</div>
