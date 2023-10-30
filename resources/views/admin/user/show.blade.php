@extends('layouts.app')

@section('title', 'Редактировать пользователя ' . $user->id)

@section('content')

    @include('admin.include.nav')

    <h1>Редактировать пользователя {{ $user->id }}</h1>

    @if($errors)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <form action="/admin/users/{{ $user->id }}" method="post"
          id="add-post-form">
        @csrf
        @method('PUT')

        <label for="cash" class="col-form-label text-md-right">Баланс</label>

        <input id="cash" type="text"
               class="form-control request-call-input @error('cash') is-invalid @enderror"
               name="cash" required placeholder="Баланс" value="{{ $user->cash }}">

        <button type="submit" class="get-more-post-btn">
            Сохранить
        </button>

    </form>

@endsection
