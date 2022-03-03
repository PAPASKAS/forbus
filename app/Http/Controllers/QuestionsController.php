<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Questions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => ['required','max:128','min:3'],
            'body' => ['required', 'max:7500']
        ]);

        if(!$validator->passes()){
            return response($validator->errors()->toArray(), 400);
        }

        $id_user = auth()->user()->id;
        $user = User::find($id_user);

        $user->user_question()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);
    }

    public function show(Request $request, $id) {
        $question = Questions::findOrFail($id);
        $userId = $question->user->id;

        $comments = DB::table('comments')->where('questions_id', $id)->latest()->paginate(5);

        return view('questions.show', [
            "comments" => $comments,
            "question" => $question,
            "userId" => $userId,
            "questionId" => $id
        ]);
    }

    public function edit(Request $request, $id) {
        $question = Questions::findOrFail($id);

        $idCurrentUser = auth()->user()->id;
        $idPostCreator = $question->user->id;

        if ($idCurrentUser !== $idPostCreator) {
            return redirect('/');
        }

        return view('questions.edit', [
            'question' => $question,
            'idQuestion' => $id
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => ['required','max:128','min:3'],
            'body' => ['required', 'max:7500']
        ]);

        $question = Questions::findOrFail($id);

        $idCurrentUser = auth()->user()->id;
        $idPostCreator = $question->user->id;

        if ($idCurrentUser !== $idPostCreator) {
            return redirect('/');
        }

        $question->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
    }
}
