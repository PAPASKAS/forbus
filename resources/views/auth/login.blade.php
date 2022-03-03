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

    <form action="{{ route('login') }}" method="POST">
        <fieldset class="form-control d-grid gap-3 w-75">
            <legend>Вход в аккаунт</legend>
            @csrf
            <label>
                Почта:
                <input type="email" name="email" class="form-control mt-1" required>
            </label>
            <label>
                Пароль:
                <input type="password" name="password" class="form-control mt-1" required>
            </label>
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                </label>
            </div>
            <div>
                <button class="btn btn-success me-3">Войти</button>

                <a href="{{ route('register') }}">Все еще нет аккаунта?</a>
            </div>
        </fieldset>
    </form>

    <div class="mt-3">

    </div>
@endsection
