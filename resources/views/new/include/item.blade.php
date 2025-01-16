@php
    /* @var $post \App\Models\Post */
@endphp

<article class="col-12 col-md-6 col-lg-4 col-xl-3 listing-post">
    <div class="article-top position-relative">
        <a href="/individualka/{{ $post->url }}" class="">
            <picture>
                <source
                    srcset="/400-500/thumbs/{{str_replace('.jpg', '.webp', $post->avatar )}}"
                    type="image/webp">
                <source srcset="/400-500/thumbs/{{ $post->avatar }}" type="image/jpeg">
                <img class="article-avatar" src="/400-500/thumbs/{{$post->avatar}}"
                     alt="{{ $post->alt }}"
                     @if(!isset($i) or $i > 2)
                         loading="lazy"
                     @endif
                     title="{{ $post->title }}">
            </picture>
        </a>
        <div class="article-top-info position-absolute">
            <div class="name-age"><a href="/individualka/{{ $post->url }}">{{ $post->name }}</a>, {{ $post->age }}</div>

            @if($metro = $post->metro->first())

                @if(isset($data['current_metro']))

                    @foreach($post->metro as $metroItem)

                        @if($metroItem->id == $data['current_metro']->id)

                            <div class="metro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7"
                                     fill="none">
                                    <circle cx="3.5" cy="3.5" r="3.5" fill="#46E356"/>
                                </svg>
                                <a href="/{{ $metro->metro_url }}" class="metro-link">
                                    {{ $metro->metro_value }}
                                </a>
                            </div>

                        @endif

                    @endforeach

                @else

                    <div class="metro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                            <circle cx="3.5" cy="3.5" r="3.5" fill="#46E356"/>
                        </svg>
                        <a href="/{{ $metro->metro_url }}" class="metro-link">
                            {{ $metro->metro_value }}
                        </a>
                    </div>

                @endif

            @endif

        </div>
    </div>
    <div class="article-bottom">
        <div class="price-wrap d-flex">
            <div class="price-item d-flex">
                <div class="price-item-name">час</div>
                <div class="price-item-cost">{{ $post->price }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12"
                         fill="none">
                        <path
                            d="M1.33333 12V10H0V8.66667H1.33333V7.33333H0V6H1.33333V0H5.66667C6.68889 0 7.55555 0.355555 8.26667 1.06667C8.97778 1.77778 9.33333 2.64444 9.33333 3.66667C9.33333 4.68889 8.97778 5.55555 8.26667 6.26667C7.55555 6.97778 6.68889 7.33333 5.66667 7.33333H2.66667V8.66667H5.33333V10H2.66667V12H1.33333ZM2.66667 6H5.66667C6.31111 6 6.86111 5.77222 7.31667 5.31667C7.77222 4.86111 8 4.31111 8 3.66667C8 3.02222 7.77222 2.47222 7.31667 2.01667C6.86111 1.56111 6.31111 1.33333 5.66667 1.33333H2.66667V6Z"
                            fill="#FF005C"/>
                    </svg>
                </div>
            </div>
            <div class="price-item price-item-item position-relative d-flex">
                <div class="price-item-name">два</div>
                <div class="price-item-cost">{{ $post->apartament_2_hour_price }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12"
                         fill="none">
                        <path
                            d="M1.33333 12V10H0V8.66667H1.33333V7.33333H0V6H1.33333V0H5.66667C6.68889 0 7.55555 0.355555 8.26667 1.06667C8.97778 1.77778 9.33333 2.64444 9.33333 3.66667C9.33333 4.68889 8.97778 5.55555 8.26667 6.26667C7.55555 6.97778 6.68889 7.33333 5.66667 7.33333H2.66667V8.66667H5.33333V10H2.66667V12H1.33333ZM2.66667 6H5.66667C6.31111 6 6.86111 5.77222 7.31667 5.31667C7.77222 4.86111 8 4.31111 8 3.66667C8 3.02222 7.77222 2.47222 7.31667 2.01667C6.86111 1.56111 6.31111 1.33333 5.66667 1.33333H2.66667V6Z"
                            fill="#FF005C"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="info-labels-wrap d-flex">

            @if($post->type == \App\Models\Post::INDI_TYPE)
                <a class="info-label">
                    #инди
                </a>
            @endif
            @if($post->service)
                @foreach($post->service as $item)
                    @if($item->id == 20)
                        <a class="info-label" href="/{{ $item->filter_url  }}">#Анал</a>
                    @endif
                    @if($item->id == 12)
                        <a class="info-label" href="/{{ $item->filter_url  }}">#Куни</a>
                    @endif
                    @if($item->id == 22)
                        <a class="info-label" href="/{{ $item->filter_url  }}">#МБР</a>
                    @endif
                    @if($item->id == 7)
                        <a class="info-label" href="/{{ $item->filter_url  }}">#МинетВМашине</a>
                    @endif
                @endforeach
            @endif
            @foreach($post->place as $item)
                <a class="info-label" href="/{{ $item->places_url }}">#{{ $item->places_value }}</a>
            @endforeach
            @if($post->national)
                <a class="info-label" href="/{{ $post->national->filter_url }}">#{{ $post->national->value }}</a>
            @endif

        </div>
        <div class="body-info d-flex">
            <div class="body-info-item d-flex flex-column">
                <div class="body-value">{{ $post->breast }}</div>
                <div class="body-name">Грудь</div>
            </div>
            <div class="body-info-item d-flex flex-column">
                <div class="body-value">{{ $post->rost }}</div>
                <div class="body-name">Рост</div>
            </div>
            <div class="body-info-item d-flex flex-column">
                <div class="body-value">{{ $post->ves }}</div>
                <div class="body-name">Вес</div>
            </div>
        </div>
        <div class="more-info-labels-wrap d-flex">
            <div class="more-info-label d-flex @if($post->check_photo_status) label-check @endif ">
                <div class="check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                        <g clip-path="url(#clip0_384_25)">
                            <path
                                d="M12.5691 2.10503L7.2097 0.0388191C7.07544 -0.012927 6.92453 -0.0129524 6.7903 0.0388191L1.43093 2.10503C1.2268 2.18374 1.09375 2.36879 1.09375 2.57402V5.08579C1.09375 8.54432 3.34493 11.6554 6.79334 12.9623C6.92579 13.0125 7.07418 13.0125 7.20666 12.9623C10.655 11.6554 12.9062 8.54435 12.9062 5.08579V2.57402C12.9062 2.36879 12.7732 2.18374 12.5691 2.10503ZM11.8125 5.08579C11.8125 8.0259 9.95312 10.7325 7 11.9406C4.12579 10.7647 2.1875 8.10557 2.1875 5.08579V2.91304L7 1.05764L11.8125 2.91304V5.08579ZM6.39554 6.79747L8.74612 4.61482C8.95967 4.41652 9.30593 4.41649 9.51951 4.61482C9.73309 4.81315 9.73306 5.13467 9.51948 5.33297L6.78223 7.8747C6.56862 8.07305 6.22237 8.07297 6.00884 7.8747L4.48049 6.45551C4.26691 6.25719 4.26691 5.93567 4.48049 5.73736C4.69407 5.53906 5.04033 5.53904 5.25388 5.73736L6.39554 6.79747Z"
                                fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_384_25">
                                <rect width="14" height="13" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="not-check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path
                            d="M5.51333 2L2 5.51333V10.4867L5.51333 14H10.4867C11.6667 12.8267 14 10.4867 14 10.4867V5.51333L10.4867 2M6.06667 3.33333H9.93333L12.6667 6.06667V9.93333L9.93333 12.6667H6.06667L3.33333 9.93333V6.06667M6.08 5.14L5.14 6.08L7.06 8L5.14 9.92L6.08 10.86L8 8.94L9.92 10.86L10.86 9.92L8.94 8L10.86 6.08L9.92 5.14L8 7.06"
                            fill="white"/>
                    </svg>
                </div>
                <div class="label-text">фото</div>
            </div>
            <div class="more-info-label @if($post->video) label-check @endif d-flex">
                <div class="check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                        <g clip-path="url(#clip0_384_25)">
                            <path
                                d="M12.5691 2.10503L7.2097 0.0388191C7.07544 -0.012927 6.92453 -0.0129524 6.7903 0.0388191L1.43093 2.10503C1.2268 2.18374 1.09375 2.36879 1.09375 2.57402V5.08579C1.09375 8.54432 3.34493 11.6554 6.79334 12.9623C6.92579 13.0125 7.07418 13.0125 7.20666 12.9623C10.655 11.6554 12.9062 8.54435 12.9062 5.08579V2.57402C12.9062 2.36879 12.7732 2.18374 12.5691 2.10503ZM11.8125 5.08579C11.8125 8.0259 9.95312 10.7325 7 11.9406C4.12579 10.7647 2.1875 8.10557 2.1875 5.08579V2.91304L7 1.05764L11.8125 2.91304V5.08579ZM6.39554 6.79747L8.74612 4.61482C8.95967 4.41652 9.30593 4.41649 9.51951 4.61482C9.73309 4.81315 9.73306 5.13467 9.51948 5.33297L6.78223 7.8747C6.56862 8.07305 6.22237 8.07297 6.00884 7.8747L4.48049 6.45551C4.26691 6.25719 4.26691 5.93567 4.48049 5.73736C4.69407 5.53906 5.04033 5.53904 5.25388 5.73736L6.39554 6.79747Z"
                                fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_384_25">
                                <rect width="14" height="13" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="not-check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path
                            d="M5.51333 2L2 5.51333V10.4867L5.51333 14H10.4867C11.6667 12.8267 14 10.4867 14 10.4867V5.51333L10.4867 2M6.06667 3.33333H9.93333L12.6667 6.06667V9.93333L9.93333 12.6667H6.06667L3.33333 9.93333V6.06667M6.08 5.14L5.14 6.08L7.06 8L5.14 9.92L6.08 10.86L8 8.94L9.92 10.86L10.86 9.92L8.94 8L10.86 6.08L9.92 5.14L8 7.06"
                            fill="white"/>
                    </svg>
                </div>
                <div class="label-text">видео</div>
            </div>
            <div class="more-info-label @if($post->reviews->first()) label-check @endif d-flex label-check">
                <div class="check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                        <g clip-path="url(#clip0_384_25)">
                            <path
                                d="M12.5691 2.10503L7.2097 0.0388191C7.07544 -0.012927 6.92453 -0.0129524 6.7903 0.0388191L1.43093 2.10503C1.2268 2.18374 1.09375 2.36879 1.09375 2.57402V5.08579C1.09375 8.54432 3.34493 11.6554 6.79334 12.9623C6.92579 13.0125 7.07418 13.0125 7.20666 12.9623C10.655 11.6554 12.9062 8.54435 12.9062 5.08579V2.57402C12.9062 2.36879 12.7732 2.18374 12.5691 2.10503ZM11.8125 5.08579C11.8125 8.0259 9.95312 10.7325 7 11.9406C4.12579 10.7647 2.1875 8.10557 2.1875 5.08579V2.91304L7 1.05764L11.8125 2.91304V5.08579ZM6.39554 6.79747L8.74612 4.61482C8.95967 4.41652 9.30593 4.41649 9.51951 4.61482C9.73309 4.81315 9.73306 5.13467 9.51948 5.33297L6.78223 7.8747C6.56862 8.07305 6.22237 8.07297 6.00884 7.8747L4.48049 6.45551C4.26691 6.25719 4.26691 5.93567 4.48049 5.73736C4.69407 5.53906 5.04033 5.53904 5.25388 5.73736L6.39554 6.79747Z"
                                fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_384_25">
                                <rect width="14" height="13" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="not-check">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path
                            d="M5.51333 2L2 5.51333V10.4867L5.51333 14H10.4867C11.6667 12.8267 14 10.4867 14 10.4867V5.51333L10.4867 2M6.06667 3.33333H9.93333L12.6667 6.06667V9.93333L9.93333 12.6667H6.06667L3.33333 9.93333V6.06667M6.08 5.14L5.14 6.08L7.06 8L5.14 9.92L6.08 10.86L8 8.94L9.92 10.86L10.86 9.92L8.94 8L10.86 6.08L9.92 5.14L8 7.06"
                            fill="white"/>
                    </svg>
                </div>
                <div class="label-text">отзыв</div>
            </div>
        </div>
    </div>
    <div class="article-phone"
         data-id="{{ $post->id }}"
         data-city="{{ $post->city_id }}"
         onclick="call(this)"
    >Показать телефон
    </div>
</article>

