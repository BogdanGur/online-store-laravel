<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Card;

class CheckoutController extends Controller
{

    public function index() {
        $is_order = Order::where("user_id", Auth::id())->first();

        if(!Auth::check()) {
            return redirect()->route("login");
        }
        if(!$is_order) {
            return back()->with(["success" => "У вас нету Ордеров"]);
        }
        return view("checkout", ["site" => Site::find(1), "products" => Cart::where("user_id", Auth::id())->get(), "total_cart" => count(Cart::where("user_id", Auth::id())->get()), "order" => Order::where("user_id", Auth::id())->first()]);
    }

    public function delete_order($id) {
        $is_order = Order::find($id);

        if(!$is_order) {
            return back()->with(["success" => "У вас нету Ордеров"]);
        } else {
            $order_prod = OrderProduct::where("order_id", $id)->get();
            foreach ($order_prod as $prod) {
                OrderProduct::find($prod->id)->delete();
            }
            Order::find($id)->delete();

            return redirect()->route("cart")->with(["success" => "У вас нету Ордеров"]);
        }
    }
}
