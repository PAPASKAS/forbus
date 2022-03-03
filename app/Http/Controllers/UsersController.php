<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller{
    public function show(Request $request, $login){
        $userId = DB::table('users')->where('name', $login)->value('id');
        $user = User::findOrFail($userId);

        $userQuestions = DB::table('questions')->where('user_id', $userId)->latest()->paginate(5);

        return view('users.show', [
            "userInfo" => $user->user_info,
            "userLogin" => $user->name,
            "userQuestions" => $userQuestions
        ]);
    }
}
