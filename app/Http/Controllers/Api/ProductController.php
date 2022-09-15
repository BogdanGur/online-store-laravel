<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Images;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::all();

        return ProductResource::collection($prod);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $new_product = new Product();
        $new_product->slug = \Illuminate\Support\Str::slug($request->name);
        $new_product->name = $request->name;
        $new_product->description = $request->description;
        $new_product->price = $request->price;
        $new_product->save();

        if($request->hasFile("image")) {
            $i = 1;
//            foreach($request->image as $img) {
                $images = new Images();

                $request->image->store("product_photos", "public");
                $images->product_id = $new_product->id;
                $images->img = $request->image->hashName();
                $images->sorting = $i;

                $images->save();
//                $i++;
//            }
        }

        return new ProductResource(Product::findOrFail($new_product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Images::select("id", "img")->where("product_id", $id)->get();
        Like::where("product_id", $id)->delete();

        foreach($images as $image) {
            Storage::delete("public/product_photos/".$image["img"]);
            Images::find($image["id"])->delete();
        }

        Product::find($id)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
