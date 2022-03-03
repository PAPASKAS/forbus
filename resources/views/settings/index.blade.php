@extends('layouts.base')

@section('main_content')
    <h2 class="mb-4">Settings</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('settingsUpdate', $idUser) }}" id="settingForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <fieldset class="d-grid gap-1 form-control py-3">
            <label class="form-label">
                Аватарка:
                <input type="file" class="form-control" name="avatar">
            </label>
            <label class="form-label">
                Имя:
                <input type="text" class="form-control" placeholder="Данил..." maxlength="32" name="name" value="{{ $userSettings["name"] }}">
            </label>
            <label class="form-label">
                Фамилия:
                <input type="text" class="form-control" placeholder="Козлов..." maxlength="32" name="surname" value="{{ $userSettings["surname"] }}">
            </label>
            <label>
                Дата рождения:
                <input type="date" class="form-control" name="birthday" value="{{ $userSettings["birthday"] }}">
            </label>
            <label>
                Статус:
                <input type="text" class="form-control" placeholder="Статус..." maxlength="255" name="status" value="{{ $userSettings["status"] }}">
            </label>
        </fieldset>

        <button type="submit" class="btn btn-success mt-3">Изменить</button>
    </form>

    <form action="{{ route('logout') }}" method="POST" class="mt-5">
        @csrf
        <button class="btn btn-danger">Выйти из аккаунта</button>
    </form>
@endsection

@section('scripts_section')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
