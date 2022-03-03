@extends('layouts.base')

@section('main_content')

    <div class="create-question">
        <form action="{{ route('questions.store') }}" method="POST" id="questionAskForm">
            <legend>Задать вопрос</legend>
            <fieldset class="form-control d-grid gap-3">
                @csrf
                <label>
                    Заголовок
                    <input type="text" name="title" class="form-control" maxlength="128" minlength="3" required/>
                </label>
                <label>
                    Подробно
                    <textarea name="body" class="form-control" rows="15" maxlength="7500" required></textarea>
                </label>
                <div>
                    <button type="submit" class="btn btn-success mb-2">Задать</button>
                </div>
            </fieldset>
        </form>
    </div>

@endsection

@section('scripts_section')
    <script src="{{ asset('js/questionCreate.js') }}"></script>
@endsection
