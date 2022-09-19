<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {

        return view("contact");
    }
}
