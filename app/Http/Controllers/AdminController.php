<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {

        if(Auth::guard("admin")->check()) {
            return view("admin.admin", ["admin" => Admin::find(Auth::guard("admin")->id())]);
        }
        return redirect()->route("show_login");
    }

    public function showLogin() {

        return view("admin.admin_login");
    }

    public function adminLogin(AdminRequest $request) {

        if(Auth::guard("admin")->attempt(["email" => $request->input("email"), "password" => $request->input("password")], $request->remember_me)) {
            return redirect()->intended("/admin");
        }
        return back()->withInput($request->only("email", "remember_me"));

    }

    public function adminLogout() {

        if(Auth::guard('admin')->check())  {
            Session::flush();

            Auth::guard('admin')->logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

    public function updateAdmin(AdminUpdateRequest $request) {

        $admin = Admin::find(Auth::guard("admin")->id());

        $admin->name = $request->name;
        $admin->surname = $request->surname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->password) {
            $admin->password = Hash::make($request->password);
        }
        if($request->hasFile("photo")) {
            if($admin->photo) {
                Storage::delete("/public/admin_photos/" . $admin->photo);
            }

            $request->photo->store("admin_photos", "public");
            $admin->photo = $request->photo->hashName();
        }
        $admin->save();

        return back()->with("success", "Данные успешно обновлены");
    }
}
