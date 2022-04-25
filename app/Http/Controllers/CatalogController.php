<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {

        return view("catalog", ["site" => Site::find(1), "products" => Product::paginate(8)]);
    }
}
