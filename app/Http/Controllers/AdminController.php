<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {

        if(Auth::guard("admin")->check()) {
            return view("admin.admin");
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
}
