<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        return view("home", ["site" => Site::find(1)]);
    }
}
