<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Like;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index() {

        return view("catalog", ["site" => Site::find(1), "products" => Product::paginate(5), "total_cart" => count(Cart::where("user_id", Auth::id())->get())]);
    }

    public function likeProduct(Request $request) {

        $is_liked = Like::where("user_id", Auth::id())->where("product_id", $request->product_id)->first();
        if(!empty($is_liked)) return response()->json(["success" => "Товар уже добавлен в список"]);

        $like = new Like();
        $like->user_id = Auth::id();
        $like->product_id = $request->product_id;

        $like->save();

        return response()->json(["success" => "Товар добавлен в избранные"]);
    }

    public function deleteLike(Request $request) {
        Like::find($request->id)->delete();

        return response()->json(["success" => "Товар был удален из избранных"]);
    }
}
