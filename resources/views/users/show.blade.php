@extends('layouts.base')

@section('css_section')
    <link rel="stylesheet" href="{{ asset('css/userPage.css') }}">
@endsection

@section('main_content')
    <div class="d-flex justify-content-between user-profile mb-2">

        <div class="card">
            <div class="card-body">
                <div>
                    <h5 class="card-title">{{ $userInfo["name"] }} {{ $userInfo["surname"] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $userInfo["status"] }}</h6>
                </div>
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#additionalProfileInfo" aria-expanded="false" aria-controls="collapseExample">
                            Дополнительная информация...
                        </button>
                    </p>
                    <div class="collapse" id="additionalProfileInfo">
                        <div class="card card-body">
                            <table class="table">
                                <tr>
                                    <td>День рождения:</td>
                                    <td><h6 class="card-subtitle mb-2 text-muted">{{ $userInfo["birthday"] }}</h6></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="avatar-block">
            <img src="/storage/img/avatars/{{ $userInfo["avatar"] }}" alt="user avatar" class="img-thumbnail">
        </div>
    </div>

    {{--  if it's my page...  --}}
    @if(Auth::user())
        @if( Auth::user()->name === $userLogin )
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('questions.create') }}" class="btn btn-success">Задать вопрос...</a>
                <a href="{{ route('settingsIndex') }}" class="btn btn-success">Мои настройки</a>
            {{--      More btn...      --}}
            </div>
        @endif
    @endif

    {{--  if news !== empty...  --}}
    @if( isset($userQuestions[0]) )

        <div class="d-grid gap-4 mt-2">
            @foreach( $userQuestions as $question )
                <x-post-block
                    :id="$question->id"
                    :title="$question->title"
                    :body="$question->body"
                    :createdAt="$question->created_at"
                    :updatedAt="$question->updated_at"
                />
            @endforeach
        </div>

        <div class="mt-3">
            {{ $userQuestions->links() }}
        </div>

    @else
        <div class="alert alert-primary mt-3">
            Пусто...
        </div>
    @endif

@endsection
