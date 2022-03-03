@extends('layouts.base')

@section('main_content')
    <div class="d-flex justify-content-between mb-3">
        <div>
            {{ $question->tags }}
        </div>
        @if(Auth::user())
            @if( Auth::user()->id === $userId )
                <div>
                    <a class="btn btn-success" href="{{ route('questions.edit', $questionId) }}">Редактировать вопрос</a>
                </div>
            @endif
        @endif
    </div>

    <style>
        .content__title {
            max-width:50%;
            word-break: break-all;
        }
        .content__body {
            white-space:break-spaces;
            word-break: break-all;
        }
    </style>

    <main class="content">
        <div class="d-flex justify-content-between gap-3">
            <h3 class="content__title">{{ $question->title }}</h3>
            <time class="content__time" datetime="{{ $question->created_at }}">
                {{ $question->created_at }}
            </time>
        </div>

        <hr/>

        <pre class="content__body">{{ $question->body }}</pre>

        <hr/>
    </main>

    <div>
        <h4>Комментарии</h4>

        @if( Auth::user() )
            <form action="{{ route('comments.store') }}" method="POST">
                <fieldset class="w-50 d-grid gap-3">
                    <legend>Оставить комментарий</legend>
                    @csrf
                    @method('POST')

                    <input type="hidden" name="questionId" value="{{ $question->id }}" required>
                    <textarea type="text" name="comment" rows="5" maxlength="255" minlength="3" class="form-control" required></textarea>

                    <div>
                        <button type="submit" class="btn btn-success">Оставить комментарий</button>
                    </div>

               </fieldset>
            </form>
        @endif

        {{--    Comment pagination    --}}
        @if( isset($comments[0]) )
            <div class="d-grid gap-4 mt-3 w-75">
                @foreach( $comments as $comment )
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <a style="text-decoration: none" href="{{ route('usersShow', $comment->login) }}">{{ $comment->login }}</a>
                            </div>
                            <div>
                                {{ $comment->updated_at }}
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3">
                {{ $comments->links() }}
            </div>
        @else
            <div class="alert alert-primary mt-3">
                Комментариев пока что нет!
            </div>
        @endif

    </div>

@endsection

@section('scripts_section')
    <script src="{{ asset('js/questionShow.js') }}"></script>
@endsection
