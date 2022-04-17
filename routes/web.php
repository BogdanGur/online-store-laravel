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
Route::get('/about', "App\Http\Controllers\AboutController@index")->name("about");
Route::get('/contact', "App\Http\Controllers\ContactController@index")->name("contact");
Route::get('/account', "App\Http\Controllers\AccountController@index")->name("account");

require __DIR__.'/auth.php';
