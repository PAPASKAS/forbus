@extends('layouts.base')

@section('main_content')
    @if( isset($questions[0]) )
        <div class="d-grid gap-4">
            @foreach($questions as $question)
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
            {{ $questions->links() }}
        </div>
    @else
        <div class="alert alert-primary">
            Вопросы пока что не заданы!
        </div>
    @endif
@endsection
