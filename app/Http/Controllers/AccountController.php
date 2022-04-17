<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index() {

        return view("account", ["user" => User::find(Auth::id())]);
    }
}
