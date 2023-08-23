@extends('intim-box.layouts.cabinet')

@section('title', 'Обратная связь')

@section('content')

    @include('intim-box.cabinet.include.sidebar')

    <main class="main col-lg-9">

        <h1>Обратная связь</h1>

        <form class="ammount__form ammount__block" method="post" action="/claim/add">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input name="site_id" value="{{ SITE_ID }}" type="hidden">
            <div class="ammount__form-item input-wrap">
                <label for="ammountName">Имя</label>
                <input id="ammountName" name="name" type="text" id=""
                       required class="ammount__form-input input" value="{{ auth()->user()->name }}">
            </div>
            <div class="ammount__form-item ammount__form-item--textarea input-wrap">
                <textarea required placeholder="Опишите проблему..." type="text" name="text"
                          class="ammount__form-input ammount__form-textarea input textarea"></textarea>
            </div>
            <button type="submit" class="ammount__form-btn btn-main">
                Отправить
            </button>
        </form>
    </main>

@endsection
