@php
    /* @var $post \App\Models\Post */
    /* @var $tarifList \App\Models\Tarif[] */
@endphp

<div class="ankets__item">
    <div class="ankets__item-header">
        <div class="ankets__item-moder"
             @if($post->publication_status == \App\Models\Post::POST_ON_PUBLICATION
 or $post->publication_status == \App\Models\Post::POST_DONT_PUBLICATION)
                 onclick="publication(this)"
             data-id="{{ $post->id }}"
            @endif
        >
            {{ $post->publication }}
        </div>
        <img src="/storage/{{ $post->avatar }}" alt="" class="ankets__item-img">
    </div>
    <div class="ankets__item-body">
        <div class="ankets__item-field ankets__item-title">
            <h3 class="ankets__item-title-text">
                {{ $post->name }}
            </h3>
            <svg>
                <use xlink:href='/intim-box/images/cabinet/sprite.svg#verif'></use>
            </svg>
        </div>
        <a href="#" class="ankets__item-phone">
                            <span>
                                <svg>
                                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#phone'></use>
                                </svg>
                            </span>
            <span>
                                {{ $post->phone }}
                            </span>
        </a>
        @if($metro = $post->metro->first())
            <div class="ankets__item-metrolist metrolist">
                <a class="ankets__item-metrolis-item metrolist__item">
                                <span>
                                    <svg>
                                        <use xlink:href='/intim-box/images/cabinet/sprite.svg#metro'></use>
                                    </svg>
                                </span>
                    <span>
                                    {{ $metro->metro_value }}
                                </span>
                </a>
            </div>
        @endif
        <div class="ankets__item-locallist locallist">
            <a class="ankets__item-locallist-item locallist__item">
                                <span>
                                    <svg>
                                        <use xlink:href='/intim-box/images/cabinet/sprite.svg#location'></use>
                                    </svg>
                                </span>
                <span>
                                    {{ $post->city->city }}
                                </span>
            </a>
        </div>
        <div href="#" class="ankets__item-phone ankets__item-phone-view">
            <svg>
                <use xlink:href='/intim-box/images/cabinet/sprite.svg#phone'></use>
            </svg>
            Просмотров телефона {{ $post->phone_view_count }}
        </div>

        <div class="ankets__item-tarif-select">

            <select name="tarif" id="" class="nice-select" data-id="{{ $post->id }}" onchange="updateTarif(this)">
                @foreach($tarifList as $tarifItem)
                    <option @if($tarifItem->id == $post->tarif_id) selected @endif value="{{ $tarifItem->id }}">{{ $tarifItem->name }} - {{ $tarifItem->sum }} р/час</option>
                @endforeach
            </select>

        </div>

        @if($post->publication_status != \App\Models\Post::POST_ON_MODERATION)
            <div onclick="upPost(this)" data-id="{{ $post->id }}" class="ankets__item-moder">Поднять анкету(70р)</div>
        @endif

        <div class="ankets__item-field ankets__item-ui">
            <a class="ankets__item-ui-item ankets__item-ui-item--1" href="/cabinet/post/{{$post->id}}/edit">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#pencil'></use>
                </svg>
            </a>
            <div onclick="delete_post(this)" data-id="{{ $post->id }}"
                 class="ankets__item-ui-item ankets__item-ui-item--3" href="#">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#trash'></use>
                </svg>
            </div>
        </div>
    </div>
</div>
