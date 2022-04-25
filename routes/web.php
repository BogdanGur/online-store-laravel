<?php

use Illuminate\Support\Facades\Route;
use App\Bogur\Bogur;

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
Route::get('/about', "App\Http\Controllers\AboutController@index")->name("about");
Route::get('/contact', "App\Http\Controllers\ContactController@index")->name("contact");

#Product Page
Route::get("/product/{slug}", "App\Http\Controllers\ProductPageController@index")->name("product_page");

#Account
Route::prefix("account")->middleware(['auth'])->group(function() {
    Route::get('/', "App\Http\Controllers\AccountController@index")->name("account");
    Route::post('/update-user', "App\Http\Controllers\AccountController@updateUser")->name("update_user");
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

    Route::post("/update-site-info", "App\Http\Controllers\AdminController@updateSiteInfo")->middleware("auth:admin")->name("update_site_info");
});

require __DIR__.'/auth.php';
