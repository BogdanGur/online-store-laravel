<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index() {

        return view("catalog", ["site" => Site::find(1), "products" => Product::paginate(8), "total_cart" => count(Cart::where("user_id", Auth::id())->get())]);
    }
}
