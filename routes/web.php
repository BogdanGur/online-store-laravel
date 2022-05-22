<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Main Menu
Route::get('/', "App\Http\Controllers\HomeController@index")->name("home");
Route::get('/catalog', "App\Http\Controllers\CatalogController@index")->name("catalog");
Route::post('/catalog/like-product', "App\Http\Controllers\CatalogController@likeProduct")->middleware("auth")->name("like_product");
Route::post('/catalog/delete-like', "App\Http\Controllers\CatalogController@deleteLike")->middleware("auth")->name("delete_like");
Route::get('/about', "App\Http\Controllers\AboutController@index")->name("about");
Route::get('/contact', "App\Http\Controllers\ContactController@index")->name("contact");

#Cart
Route::prefix("cart")->group(function () {
    Route::get('/', "App\Http\Controllers\CartController@index")->name("cart");
    Route::post("/add-product", "App\Http\Controllers\CartController@addProduct")->middleware("auth")->name("add_cart");
    Route::post("/fast-add-product", "App\Http\Controllers\CartController@fastAddProduct")->middleware("auth")->name("fast_add_cart");
    Route::post("/update-product", "App\Http\Controllers\CartController@updateProduct")->middleware("auth")->name("update_cart");
    Route::get("/remove-product/{id}", "App\Http\Controllers\CartController@removeProduct")->middleware("auth")->name("remove_cart");

    Route::get("/add-checkout", "App\Http\Controllers\CartController@addCheckout")->middleware("auth")->name("add_checkout");
});

#Checkout
Route::prefix("checkout")->group(function () {
    Route::get("/", "App\Http\Controllers\CheckoutController@index")->name("checkout");
    Route::get("/delete-order/{id}", "App\Http\Controllers\CheckoutController@deleteOrder")->name("delete_order");
    Route::post('/purchase', "App\Http\Controllers\CheckoutController@purchase")->name("purchase");
    Route::post('/cancel-purchase', "App\Http\Controllers\CheckoutController@cancelPurchase")->name("cancel_purchase");
});

#Product Page
Route::get("/product/{slug}", "App\Http\Controllers\ProductPageController@index")->name("product_page");

#Account
Route::prefix("account")->middleware(['auth'])->group(function() {
    Route::get('/', "App\Http\Controllers\AccountController@index")->name("account");
    Route::post('/update-user', "App\Http\Controllers\AccountController@updateUser")->name("update_user");
    Route::post('/delete-like/{id}', "App\Http\Controllers\AccountController@deleteLike")->name("delete_like");
});

#Admin
Route::prefix("admin")->group(function() {
    Route::get('/', "App\Http\Controllers\AdminController@index")->name("admin");
    Route::get('/login', "App\Http\Controllers\AdminController@showLogin")->name("show_login");
    Route::post('/login', "App\Http\Controllers\AdminController@adminLogin")->name("admin_login");
    Route::get('/logout', "App\Http\Controllers\AdminController@adminLogout")->name("admin_logout");
    Route::post('/update-admin', "App\Http\Controllers\AdminController@updateAdmin")->middleware('auth:admin')->name("update_admin");

    Route::post("/add-product", "App\Http\Controllers\AdminController@addProduct")->middleware("auth:admin")->name("add_product");
    Route::post("/update-product/{id}", "App\Http\Controllers\AdminController@updateProduct")->middleware("auth:admin")->name("update_product");
    Route::get("/delete-product/{id}", "App\Http\Controllers\AdminController@deleteProduct")->middleware("auth:admin")->name("delete_product");
    Route::post("/sorting-photos", "App\Http\Controllers\AdminController@sortImages")->middleware("auth:admin")->name("sort_images");

    Route::post("/update-site-info", "App\Http\Controllers\AdminController@updateSiteInfo")->middleware("auth:admin")->name("update_site_info");
});

Route::get("/send-mail", "App\Http\Controllers\MailController@send")->name("mail.send");


require __DIR__.'/auth.php';
