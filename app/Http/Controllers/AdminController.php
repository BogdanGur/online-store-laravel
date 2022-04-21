<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Admin;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index() {

        if(Auth::guard("admin")->check()) {
            return view("admin.admin", ["admin" => Admin::find(Auth::guard("admin")->id()), "products" => Product::all()]);
        }
        return redirect()->route("show_login");
    }

    public function showLogin() {

        return view("admin.admin_login");
    }

    public function adminLogin(AdminRequest $request) {

        if(Auth::guard("admin")->attempt(["email" => $request->input("email"), "password" => $request->input("password")], $request->remember_me)) {
            return redirect()->intended("/admin");
        }
        return back()->withInput($request->only("email", "remember_me"));

    }

    public function adminLogout() {

        if(Auth::guard('admin')->check())  {
            Session::flush();

            Auth::guard('admin')->logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

    public function updateAdmin(AdminUpdateRequest $request) {

        $admin = Admin::find(Auth::guard("admin")->id());

        $admin->name = $request->name;
        $admin->surname = $request->surname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->password) {
            $admin->password = Hash::make($request->password);
        }
        if($request->hasFile("photo")) {
            if($admin->photo) {
                Storage::delete("/public/admin_photos/" . $admin->photo);
            }

            $request->photo->store("admin_photos", "public");
            $admin->photo = $request->photo->hashName();
        }
        $admin->save();

        return back()->with("success", "Данные успешно обновлены");
    }

    public function addProduct(ProductRequest $request) {
        $product = new Product();


        $product->slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->variation = $request->size;

        $product->save();

        if($request->hasFile("image")) {
            $i = 1;
            foreach($request->image as $image) {
                $images = new Images();

                $image->store("product_photos", "public");
                $images->product_id = $product->id;
                $images->img = $image->hashName();
                $images->sorting = $i;

                $images->save();
                $i++;
            }
        }

        return redirect()->route("admin")->with("success", "Новый продукт успешно добавлен");
    }

    public function updateProduct(ProductRequest $request, $id) {
        $product = Product::find($id);


        $product->slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->variation = $request->size;

        $product->save();

        if($request->hasFile("image")) {

            $old_images = Images::select("id", "img")->where("product_id", $id)->get();

            foreach($old_images as $old_i) {
                Storage::delete("public/product_photos/".$old_i["img"]);
                Images::find($old_i["id"])->delete();
            }
            $i = 1;
            foreach($request->image as $image) {
                $images = new Images();

                $image->store("product_photos", "public");
                $images->product_id = $product->id;
                $images->img = $image->hashName();
                $images->sorting = $i;

                $images->save();
                $i++;
            }
        }

        return redirect()->route("admin")->with("success", "Данные об продекте успешно обновлены");
    }

    public function deleteProduct($id) {
        $images = Images::select("id", "img")->where("product_id", $id)->get();

        foreach($images as $image) {
            Storage::delete("public/product_photos/".$image["img"]);
            Images::find($image["id"])->delete();
        }

        Product::find($id)->delete();

        return redirect()->route("admin")->with("success", "Продукт успешно удален");
    }
}
