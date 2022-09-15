<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Redis;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;

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
Route::get('/', [HomeController::class, 'index'])->name("home");

#Catalog
Route::prefix('catalog')->controller(CatalogController::class)->group(function() {
    Route::get('/', 'index')->name("catalog");
    Route::post('/like-product', 'likeProduct')->middleware("auth")->name("catalog.likeAdd");
    Route::post('/delete-like', 'deleteLike')->middleware("auth")->name("catalog.likeDelete");
});

Route::get('/about', [AboutController::class, 'index'])->name("about");
Route::get('/contact', [ContactController::class, 'index'])->name("contact");

#Cart
Route::prefix("cart")->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name("cart");
    Route::post("/add-product", 'addProduct')->middleware("auth")->name("cart.add");
    Route::post("/fast-add-product", 'fastAddProduct')->middleware("auth")->name("cart.fastAdd");
    Route::post("/update-product", 'updateProduct')->middleware("auth")->name("cart.update");
    Route::get("/remove-product/{id}", 'removeProduct')->middleware("auth")->name("cart.remove");

    Route::get("/add-checkout", 'addCheckout')->middleware("auth")->name("cart.checkoutAdd");
});

#Checkout
Route::prefix("checkout")->controller(CheckoutController::class)->group(function () {
    Route::get("/", 'index')->name("checkout");
    Route::get("/delete-order/{id}", 'deleteOrder')->name("checkout.orderDelete");
    Route::post('/purchase', 'purchase')->name("checkout.purchase");
    Route::post('/cancel-purchase', 'cancelPurchase')->name("checkout.purchaseCancel");
});

#Product Page
Route::get("/product/{slug}", [ProductPageController::class, 'index'])->name("productPage");

#Account
Route::prefix("account")->middleware(['auth'])->controller(AccountController::class)->group(function() {
    Route::get('/', 'index')->name("account");
    Route::post('/update-user', 'updateUser')->name("account.userUpdate");
    Route::post('/delete-like/{id}', 'deleteLike')->name("account.likeDelete");
});

#Admin
Route::prefix("admin")->controller(AdminController::class)->group(function() {
    Route::get('/', 'index')->name("admin");
    Route::get('/login', 'showLogin')->name("admin.loginShow");
    Route::post('/login', 'adminLogin')->name("admin.login");
    Route::get('/logout', 'adminLogout')->name("admin.logout");
    Route::post('/update-admin', 'updateAdmin')->middleware('auth:admin')->name("admin.update");

    Route::post("/add-product", 'addProduct')->middleware("auth:admin")->name("admin.productAdd");
    Route::post("/update-product/{id}", 'updateProduct')->middleware("auth:admin")->name("admin.productUpdate");
    Route::get("/delete-product/{id}", 'deleteProduct')->middleware("auth:admin")->name("admin.productDelete");
    Route::post("/sorting-photos", 'sortImages')->middleware("auth:admin")->name("admin.imageSort");

    Route::post("/update-site-info", 'updateSiteInfo')->middleware("auth:admin")->name("admin.siteInfoUpdate");
});

Route::get("/send-mail", [MailController::class, 'send'])->name("mail.send");

require __DIR__.'/auth.php';
