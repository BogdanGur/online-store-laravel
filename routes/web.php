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

Route::get('/', "App\Http\Controllers\HomeController@index")->name("home");
Route::get('/catalog', "App\Http\Controllers\CatalogController@index")->name("catalog");
Route::get('/about', "App\Http\Controllers\AboutController@index")->name("about");
Route::get('/contact', "App\Http\Controllers\ContactController@index")->name("contact");
Route::get('/account', "App\Http\Controllers\AccountController@index")->middleware(["auth", "verified"])->name("account");

Route::prefix("admin")->group(function() {
    Route::get('/', "App\Http\Controllers\AdminController@index")->name("admin");
    Route::get('/login', "App\Http\Controllers\AdminController@showLogin")->name("show_login");
    Route::post('/login', "App\Http\Controllers\AdminController@adminLogin")->name("admin_login");
});

require __DIR__.'/auth.php';
