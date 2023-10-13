@extends('intim-box.layouts.cabinet')

@section('title', 'Пополнить баланс')

@section('content')

    @include('intim-box.cabinet.include.sidebar')

    <main class="main col-lg-9">

        <h1 class="ammount__title title">Кошелек</h1>
        <div class="ammount__info ammount__block">
            <div class="ammount__info-balance">
                <h2 class="ammount__info-balance-title">
                    Баланс
                </h2>
                <div class="ammount__info-balance-value">
                    {{ auth()->user()->cash }}
                </div>
                <div class="ammount__info-balance-descr">
                    Пополните счет любым удобным ддля вас споссбом
                </div>
            </div>
            <form class="ammount__info-balance-repl" method="post" action="/cabinet/pay">
                @csrf
                <label for="balanceReplCur">Введите сумму пополнения(минимум 500р)</label>
                <div class="ammount__info-balance-repl-input-wrap">
                        <span data-val="500">
                            <input class="ammount__info-balance-repl-input" type="text" id="balanceReplCur"
                                   name="sum" value="500"
                                   oninput="this.parentElement.setAttribute('data-val',  this.value)"
                            >
                        </span>

                </div>
                <div class="ammount__info-balance-repl-label">
                    Выберите способ оплаты:
                </div>
                <div class="ammount__info-balance-repl-radio-items">
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" checked value="1" id="balanceReplQiwi"
                               class="ammount__info-balance-repl-radio-input">
                        <label for="balanceReplQiwi">
                            Киви
                        </label>
                    </div>
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" value="2" id="balanceReplVisaMastercard"
                               class="ammount__info-balance-repl-radio-input">
                        <label for="balanceReplVisaMastercard">
                            Карта
                        </label>
                    </div>
                </div>

                <script defer src='https://www.google.com/recaptcha/api.js'></script>

                <div id="register_recapcha" class="g-recaptcha" data-sitekey="6Lffq2EkAAAAAK4PuAXJjhnE1NOP1uUjANyEUxe_"></div>

                <button
                    id="payBtn"
                    class="ammount__info-balance-repl-btn btn-main">Оплатить
                </button>
            </form>
        </div>
        <h2 class="ammount__subtite subtitle">
            Воспользуйтесь быстрым платежом для экономии времени.
        </h2>
        <div class="ammount__fast-items ammount__block">

            @foreach($fastSum as $item)
                <div class="ammount__fast-item">

                    @if($item >= $bonusSum)
                        <span class="ammount__fast-item-discount">
                        -10%
                    </span>
                    @endif

                    <div class="ammount__fast-item-header">
                        <div class="ammount__fast-item-balance">
                            {{ $item }} руб.
                        </div>
                        @php
                            if ($item >= $bonusSum){
                                $sum = $item + ($item / 100 * 10) ;
                            }
                            else {
                                $sum = $item;
                            }
                        @endphp
                        <a href="#" data-sum="{{ $sum }}" onclick="setSum(this)"
                           class="ammount__fast-item-btn btn-main">
                            Оплатить
                        </a>
                    </div>
                    @if($item >= $bonusSum)
                        <span class="ammount__fast-item-sumbalance">
                        Будет начислено: {{ $item + ($item / 100 * 10) }}р
                    </span>
                    @endif

                </div>
            @endforeach

        </div>ё

    </main>

@endsection
