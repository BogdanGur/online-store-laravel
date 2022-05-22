<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Site;
use App\Payment\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        return view("home", ["site" => Site::findOrFail(1), "products" => Product::all(), "total_cart" => count(Cart::where("user_id", Auth::id())->get())]);
    }
}
