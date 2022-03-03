@extends('layouts.base')

@section('main_content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        <fieldset class="form-control d-grid gap-3 w-75">
            <legend>Создание аккаунта</legend>
            @csrf
            <label>
                Логин:
                <input type="text" name="name" class="form-control mt-1" required>
            </label>
            <label>
                Почта:
                <input type="email" name="email" class="form-control mt-1" required>
            </label>
            <label>
                Пароль:
                <input type="password" name="password" class="form-control mt-1" required>
            </label>
            <label>
                Повторите пароль:
                <input type="password" name="password_confirmation" class="form-control mt-1" required>
            </label>
            <div>
                <button class="btn btn-success me-3">Регистрация</button>

                <a href="{{ route('login') }}">Уже есть аккаунт?</a>
            </div>
        </fieldset>
    </form>

@endsection
