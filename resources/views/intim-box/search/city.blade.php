@if($cityList->first)
    @foreach($cityList as $item)
        <li class="header__location-list__sub-item">
            <a href="https://{{ $item->url }}{{ SITE }}" class="header__location-list__sub-link link-reset">
                {{ $item->city }}
            </a>
        </li>
    @endforeach
@endif
