@php
    /* @var $post \App\Models\Post */
@endphp
<div class="post">
    <div class="post-content">
        <div data-id="{{ $post->id }}" onclick="add_to_favorite(this)"
             class="
             @if(\App\Actions\AddFavoriteToCookie::check($post->id))
                 catalog-item__favorite_add
             @endif
             catalog-item__favorite
             ">
            <img
                width="27px"
                height="23px"
                src="/img/favorite.png" alt="Добавить в избранное">
        </div>
        <a class="img-wrap" href="/post/{{ $post->url }}">

            <picture>

                <source srcset="/211-300/thumbs/{{str_replace('.jpg', '.webp', $post->avatar)}}" type="image/webp">
                <source srcset="/211-300/thumbs/{{$post->avatar}}" type="image/jpeg">

                <img class="catalog-item__img" src="/400-500/thumbs/{{$post->avatar}}"
                     alt="{{ $post->name }}"

                     @if(!isset($i) or $i > 2)
                         loading="lazy"
                     @endif
                     title="Проститутка {{ $post->title }}">
            </picture>

        </a>
        <div class="name-wrap">
            <div class="name bold-text">
                <a href="/post/{{ $post->url }}" class="bold-text">
                    {{ $post->name }}
                    @if($post->check_photo_status)

                        <span class="check-block">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                 width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path
                                        fill="#2ad352"
                                        d="M256 0C114.62 0 0 114.58 0 256s114.62 256 256 256 256-114.65 256-256S397.38 0 256 0z"
                                        data-original="#2ad352"></path><path fill="#74da7f"
                                                                             d="M0 256a254.87 254.87 0 0 0 30.49 121.23 278.76 278.76 0 0 0 78.73 11.29c153.9 0 278.66-124.76 278.66-278.66a278.7 278.7 0 0 0-11.64-79.94A254.86 254.86 0 0 0 256 0C114.62 0 0 114.58 0 256z"
                                                                             data-original="#74da7f"></path><path
                                        fill="#ffffff"
                                        d="M402 213.58 248.13 375.17a45.16 45.16 0 0 1-32.48 14h-.2a45.11 45.11 0 0 1-32.4-13.71l-81.65-84.1a45.14 45.14 0 1 1 64.78-62.87l48.95 50.42 121.49-127.58A45.14 45.14 0 1 1 402 213.58z"
                                        data-original="#ffffff"></path></g></svg>
                        </span>

                    @endif
                </a>
            </div>

            @if($metro = $post->metro->first())
                <div class="catalog-metro bold-text">
                    <a href="/{{ $metro->metro_url }}">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0"
                             viewBox="0 0 95.334 95.334" style="enable-background:new 0 0 512 512" xml:space="preserve"
                             class=""><g>
                                <path
                                    d="M47.784 0C21.447 0 0 21.449 0 47.904c0 26.215 21.447 47.43 47.784 47.43s47.55-21.098 47.55-47.43C95.334 21.449 73.168 0 47.784 0zm0 89.011c-22.639 0-41.229-18.465-41.229-41.106 0-22.757 18.591-41.591 41.229-41.591 22.526 0 40.995 18.95 40.995 41.591 0 22.404-18.468 41.106-40.995 41.106z"
                                    fill="#ed0d0d" data-original="#000000" class=""></path>
                                <path
                                    d="M66.139 22.644c-2.973 0-4.17 1.311-5.479 3.934L47.787 53.389h-.117L34.68 26.577c-1.313-2.624-2.502-3.934-5.482-3.934-3.932 0-5.244 2.502-5.244 4.884v41.587c0 2.27 1.791 3.575 3.932 3.575 1.906 0 4.051-1.306 4.051-3.575v-30.98h.121l11.797 24.071c.835 1.668 1.91 2.626 3.816 2.626 1.901 0 2.979-.958 3.813-2.626l11.795-24.071h.121v30.98c0 2.27 2.143 3.575 4.05 3.575 2.147 0 3.932-1.306 3.932-3.575V27.528c-.001-2.382-1.308-4.884-5.243-4.884z"
                                    fill="#ed0d0d" data-original="#000000" class=""></path>
                            </g></svg>
                        {{ $metro->metro_value }}</a>
                </div>
            @endif

            <div class="bold-text price">
                От {{ $post->price }}р.
            </div>

        </div>
        <div class="post-info">
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
        </div>

        <div class="links">

            @if($post->national)
                <div class="links-item">
                    <a href="/{{ $post->national->filter_url }}">#{{ $post->national->value }}</a>
                </div>
            @endif

            @if($post->service)
                @foreach($post->service as $item)
                    @if($item->id == 20)
                        <div class="links-item">
                            <a href="/{{ $item->filter_url  }}">#Анал</a>
                        </div>
                    @endif
                    @if($item->id == 12)
                        <div class="links-item">
                            <a href="/{{ $item->filter_url  }}">#Куни</a>
                        </div>
                    @endif
                    @if($item->id == 22)
                        <div class="links-item">
                            <a href="/{{ $item->filter_url  }}">#МБР</a>
                        </div>
                    @endif
                    @if($item->id == 7)
                        <div class="links-item">
                            <a href="/{{ $item->filter_url  }}">#МинетВМашине</a>
                        </div>
                    @endif
                @endforeach
            @endif

            @foreach($post->place as $item)
                <div class="links-item">
                    <a href="/{{ $item->places_url }}">#{{ $item->places_value }}</a>
                </div>
            @endforeach

        </div>

        <div data-id="{{ $post->id }}" data-city="{{ $post->city_id }}" onclick="phone(this)"
             class="yellow-btn phone ">Показать телефон
        </div>
    </div>
</div>
