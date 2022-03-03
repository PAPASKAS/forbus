<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;

class CommentsController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $request->validate([
            'comment' => 'min:3|max:255|required'
        ]);

        $currentQuestion = Questions::find($request->questionId);

        $currentQuestion->comments()->create([
            'user_id' => auth()->user()->id,
            'login' => auth()->user()->name,
            'comment' => $request->comment
        ]);
    }

    public function update() {

    }

    public function destroy() {

    }

}
