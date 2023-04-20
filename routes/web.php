<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
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


Route::get("/",[HomeController::class,"index"]);
Route::get("/users",[AdminController::class,"user"]);
Route::get("/foods",[AdminController::class,"food"]);
Route::get("/shopping-cart",[CartController::class,"addcart"]);
Route::post("/uploadfood",[AdminController::class,"uploadfood"]);
Route::post("/uploadchefs",[AdminController::class,"uploadchefs"]);
Route::get("/chefs",[AdminController::class,"chefs"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/redirects",[HomeController::class,"redirects"]);

Route::get("/logout",[HomeController::class,"logout"]);
Route::get("/logout",[AdminController::class,"logout"]);

Route::post("/addtocart/{id}",[CartController::class,"addtocart"]);
Route::get("/shopping-cart/{id}",[HomeController::class,"shoppingcart"]);
Route::get("/deletefood/{id}",[AdminController::class,"deletefood"]);
Route::get("/updatefood/{id}",[AdminController::class,"updatefood"]);
Route::post("/updatemeal/{id}",[AdminController::class,"updatemeal"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteusers"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
