<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{

    public function index() {

        return view("account", ["user" => User::find(Auth::id())]);
    }

    public function updateUser(UserUpdateRequest $request) {

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($request->hasFile("photo")) {
            if($user->photo) {
                Storage::delete("/public/user_photos/" . $user->photo);
            }

            $request->photo->store("user_photos", "public");
            $user->photo = $request->photo->hashName();
        }
        $user->save();

        return back()->with("success", "Данные успешно обновлены");
    }
}
