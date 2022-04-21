<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {

        return view("about", ["site" => Site::find(1)]);
    }
}
