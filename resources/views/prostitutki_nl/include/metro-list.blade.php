
@if($data['metro'] and $data['metro']->first())
    <div class="top-nav metro-nav">
        <svg class="header__location-icon">
            <use xlink:href="/svg/dest/stack/sprite.svg#metro"></use>
        </svg>
        <span>Метро</span>
        <ul class="metro-list">

            @foreach($data['metro'] as $item)
                @php
                    /* @var $item \App\Models\Metro */
                @endphp

                <li>
                    <a href="/{{ $item->filter_url }}" >{{ $item->value }}</a>
                </li>
            @endforeach

        </ul>
    </div>
@endif
