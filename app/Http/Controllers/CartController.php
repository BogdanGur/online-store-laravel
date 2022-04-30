<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {

        return view("cart", ["site" => Site::find(1), "products" => Cart::where("user_id", Auth::id())->get(), "total_cart" => count(Cart::where("user_id", Auth::id())->get())]);
    }

    public function addProduct(CartRequest $request) {

        if(!Auth::check()) return response()->json(["success" => "Login to your Account"]);

        $cart = Cart::where("user_id", Auth::id())->where("product_id", $request->product_id)->where("size", $request->size)->first();
        if(empty($cart)) {
            $cart = new Cart();
        }

        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->size = $request->size;
        $cart->quantity = $request->quantity;
        $cart->total =  $request->quantity * $request->total;

        $cart->save();

        $total = Cart::where("user_id", Auth::id())->get();

        return response()->json(["success" => "Done", "total" => count($total)]);
    }

    public function updateProduct(Request $request) {

        if(!Auth::check()) return response()->json(["success" => "Login to your Account"]);

        $cart = Cart::find($request->product_id);

        $cart->quantity = $request->quantity;
        $cart->total =  $request->quantity * $request->price;

        $cart->save();

        return response()->json(["success" => "Done", "product_total" => $cart->total]);
    }

    public function removeProduct($id) {

        Cart::find($id)->delete();

        return back()->with("success", "Товар удален с корзины");
    }
}
