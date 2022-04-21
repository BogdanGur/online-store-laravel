<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {

        return view("contact", ["site" => Site::find(1)]);
    }
}
