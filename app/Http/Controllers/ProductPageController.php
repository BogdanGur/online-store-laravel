<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index($slug) {

        return view("product_page", ["product" => Product::where("slug", $slug)->first(), "site" => Site::find(1)]);
    }
}
