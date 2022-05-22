<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Card;
use Laravel\Cashier\PaymentMethod;

class CheckoutController extends Controller
{

    public function index() {
        $is_order = Order::where("user_id", Auth::id())->where("status", "process")->first();

        if(!Auth::check()) {
            return redirect()->route("login");
        }
        if(!$is_order) {
            return back()->with(["success" => "У вас нету Ордеров"]);
        }

        return view("checkout", ["site" => Site::find(1), "products" => Cart::where("user_id", Auth::id())->get(), "total_cart" => count(Cart::where("user_id", Auth::id())->get()), "order" => Order::where("user_id", Auth::id())->where("status", "process")->first()]);
    }

    public function deleteOrder($id) {
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

    public function purchase(Request $request) {
        $stripeCharge = $request->user()->charge($request->orderPrice*100, $request->paymentMethodId, [
                'description' => "Order Id: ".$request->orderId,
            ]
        );

        $ship = [
            "First Name" => $request->firstName,
            "Last Name" => $request->lastName,
            "Country" => $request->country,
            "City" => $request->city,
            "Street Address" => $request->streetAddress,
            "Appartment" => $request->appartment,
            "Zip Code" => $request->zipCode,
            "Phone" => $request->phone,
        ];

        $order = Order::find($request->orderId);
        $order->status = "paid";
        $order->payment_type = "card";
        $order->billing = json_encode($ship);
        $order->shipping = json_encode($ship);
        $order->save();

        Cart::where("user_id", Auth::id())->delete();

        return response()->json(["data" => $stripeCharge]);
    }

    public function cancelPurchase(Request $request) {
        $order = Order::find($request->orderId);
        $order->status = "declined";
        $order->save();

        return response()->json(["data" => "Error"]);
    }

}
