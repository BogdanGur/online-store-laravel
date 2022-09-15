<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Site;
use App\Payment\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index() {

        $s = \request("q");

        return view("home", ["site" => Site::findOrFail(1), "products" => Product::where("name", "LIKE", "%{$s}%")->paginate(5), "total_cart" => count(Cart::where("user_id", Auth::id())->get())]);
    }
}
