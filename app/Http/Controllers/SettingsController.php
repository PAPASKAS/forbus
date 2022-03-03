<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request) {
        $id_user = auth()->user()->id;
        $user_info = User::find($id_user)->user_info;

        return view('settings.index', ["userSettings" => $user_info, "idUser" => $id_user]);
    }

    public function update (Request $request) {
        $request->validate([
            'avatar' => 'mimetypes:image/jpeg,image/png',
            'name' => 'required|string|min:3|max:32',
            'surname' => 'required|string|min:3|max:32',
            'birthday' => 'date|max:10',
            'status' => 'max:255'
        ]);

        $id_user = auth()->user()->id;
        $user = User::find($id_user);

        if($request->file('avatar')){
            $this::update_avatar($request->file('avatar'), $user->user_info);
        }

        $user->user_info->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'status' => $request->status
        ]);

        return view('settings.index', ["userSettings" => $user->user_info, "idUser" => $id_user]);
    }

    private function update_avatar ($file, $user_info) {
        //delete old
        if($user_info->avatar){
            Storage::disk('public')->delete('img/avatars/' . $user_info->avatar);
        }

        // upload new
        $pathToFile = Storage::disk('public')->put('img/avatars', $file);

        // update db
        // mb_substr => /public/img/namePhoto.png => namePhoto.png
        $user_info->update(['avatar' => mb_substr($pathToFile, 12, 99)]);
    }
}
