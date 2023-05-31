@php
    /* @var $post \App\Models\Post */
@endphp

<div class="ankets__item">
    <div class="ankets__item-header">
                        <span class="ankets__item-moder">
                            {{ $post->publication }}
                        </span>
        <span class="ankets__item-select">
                            <label for="anketItem1"></label>
                            <input type="checkbox" id="anketItem1">
                        </span>
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
        <div class="ankets__item-field ankets__item-ui">
            <a class="ankets__item-ui-item ankets__item-ui-item--1" href="/cabinet/post/{{$post->id}}/edit">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#pencil'></use>
                </svg>
            </a>
            <a class="ankets__item-ui-item ankets__item-ui-item--2" href="#">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#up'></use>
                </svg>
            </a>
            <a class="ankets__item-ui-item ankets__item-ui-item--3" href="#">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#trash'></use>
                </svg>
            </a>
            <a class="ankets__item-ui-item ankets__item-ui-item--4" href="#">
                <svg>
                    <use xlink:href='/intim-box/images/cabinet/sprite.svg#turn'></use>
                </svg>
            </a>
        </div>
    </div>
    <div class="ankets__item-footer">
        <select class="ankets__item-tarif" name="tarif" id="">
            <option class="ankets__item-tarif-option ankets__item-tarif-option--1" value="1">
                <img src="images/icons/diamond1.png" alt="">
                тариф1
            </option>
            <option class="ankets__item-tarif-option ankets__item-tarif-option--2" value="2">
                <span>dsds</span>
                тариф2
            </option>
            <option class="ankets__item-tarif-option ankets__item-tarif-option--3" value="3">
                тариф3
            </option>
        </select>
    </div>
</div>
