@extends('intim-box.layouts.cabinet')

@section('title', 'Пополнить баланс')

@section('content')
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
            <label for="balanceReplCur">Введите сумму пополнения:</label>
            <div class="ammount__info-balance-repl-input-wrap">
                        <span data-val="300">
                            <input class="ammount__info-balance-repl-input" type="text" id="balanceReplCur"
                                   name="sum" value="300"
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
            <button
                id="payBtn"
                class="ammount__info-balance-repl-btn btn-main">Оплатить</button>
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
                    <a href="#" data-sum="{{ $sum }}" onclick="setSum(this)" class="ammount__fast-item-btn btn-main">
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

    </div>
    <h2 class="ammount__subtitle subtitle">
        История денежных операций
    </h2>
    <div class="ammount__story ammount__block">
        <table>
            <table>
                <thead>
                <tr>
                    <th>Дата:</th>
                    <th>Сумма:</th>
                </tr>
                </thead>
            </table>
            <div class="ammount__story-body">
                <table>
                    <tbody>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    <tr>
                        <td>17 апреля 2023 г</td>
                        <td>+ 3 435,8 руб.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </table>
    </div>
    <h2 class="ammount__subtitle subtitle">
        Если возникли сложности с оплатой свяжитесь с намии
    </h2>
    <form class="ammount__form ammount__block">
        <div class="ammount__form-item input-wrap">
            <label for="ammountName">Имя</label>
            <input id="ammountName" type="text" id="" class="ammount__form-input input">
        </div>
        <div class="ammount__form-item input-wrap">
            <label for="ammountEame">E-mail</label>
            <input id="ammountEame" placeholder="" type="email" class="ammount__form-input input">
        </div>
        <div class="ammount__form-fileadd input-wrap">
            <input type="file" id="ammountFile" name="ammountFile">
            <label for="ammountFile">
                <svg>
                    <use xlink:href='svg/dest/stack/sprite.svg#attach'></use>
                </svg>
                Прикрепить файл
            </label>
        </div>
        <div class="ammount__form-item ammount__form-item--textarea input-wrap">
            <textarea placeholder="Опишите проблему..." type="text"
                      class="ammount__form-input ammount__form-textarea input textarea"></textarea>
        </div>
        <button type="submit" class="ammount__form-btn btn-main">
            Отправить
        </button>
    </form>
@endsection
