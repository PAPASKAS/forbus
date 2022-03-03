@extends('layouts.base')

@section('main_content')
    <form action="{{ route('questions.update', $idQuestion) }}" method="POST">
        <legend>Редактирование</legend>
        <fieldset class="form-control d-grid gap-3">
            @csrf
            @method('PUT')
            <label>
                Заголовок
                <input type="text" name="title" class="form-control" maxlength="128" minlength="3" required value="{{ $question->title }}"/>
            </label>
            <label>
                Подробно
                <textarea name="body" class="form-control" rows="15" maxlength="7500" required>{{ $question->body }}</textarea>
            </label>
            <div>
                <button type="submit" class="btn btn-success mb-2">Изменить</button>
            </div>
        </fieldset>
    </form>
@endsection

@section('scripts_section')
    <script src="{{ asset('js/questionEdit.js') }}"></script>
@endsection

