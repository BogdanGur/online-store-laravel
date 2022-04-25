<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        return view("home", ["site" => Site::find(1), "products" => Product::all()]);
    }
}
