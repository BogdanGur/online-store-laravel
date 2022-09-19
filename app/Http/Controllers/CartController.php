<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {

        return view("cart", [
            "products" => Cart::where("user_id", Auth::id())->get()
        ]);
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

    public function addCheckout() {
        $all_cart = Cart::where("user_id", Auth::id())->get();
        $is_order = Order::where("user_id", Auth::id())->where("status", "process")->first();

        if($is_order) {
            $order_prod = OrderProduct::where("order_id", $is_order->id)->get();

            foreach ($order_prod as $prod) {
                OrderProduct::find($prod->id)->delete();
            }
            Order::find($is_order->id)->delete();
        }

        $order = new Order();

        $tprice = \request("price");
        $subtotal = \request("subtotal");
        $tdiscount = \request("discount");

        if(count($all_cart) > 0) {
            $order->user_id = Auth::id();
            $order->subtotal_price = $subtotal;
            $order->total_price = $tprice;
            $order->total_discount = $tdiscount;
            $order->save();

            foreach($all_cart as $cart) {
                $op = new OrderProduct();

                $op->order_id = $order->id;
                $op->product_id = $cart->product_id;
                $op->size = $cart->size;
                $op->quantity = $cart->quantity;
                $op->price = $cart->total;

                $op->save();
            }
        }

        return redirect()->route("checkout");
    }
}
