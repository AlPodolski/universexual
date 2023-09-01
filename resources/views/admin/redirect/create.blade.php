@extends('layouts.app')

@section('title', 'Добавить редирект')

@section('content')

    @include('admin.include.nav')

    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if(session('success'))

        <div class="alert">
            {{ session()->get('success') }}
        </div>

    @endif

    <form class="form ащк" method="post" action="/admin/redirect">
        @csrf
        <div class="form-group">
            <input class="form-control request-call-input" type="text" placeholder="Откуда" name="from">
        </div>
        <div class="form-group">
            <input class="form-control request-call-input" type="text" placeholder="Куда" name="to">
        </div>

        <div class="form-group">

            <labe for="site">Выбрать сайт</labe>

            <select class="form-control" name="site" id="site">
                <option value="1">PR.NL</option>
                <option value="2">INTIM-BOX</option>
            </select>

        </div>

        <input type="submit" value="Сохранить">

    </form>

@endsection
