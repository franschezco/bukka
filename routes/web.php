<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::get("/",[HomeController::class,"index"]);
Route::get("/checkout",[HomeController::class,"checkout"]);
Route::get("/logout",[HomeController::class,"logout"]);
Route::get("/logout",[AdminController::class,"logout"]);
Route::get("/redirects",[HomeController::class,"redirects"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/updatefood/{id}",[AdminController::class,"updatefood"]);
Route::get("/users",[AdminController::class,"user"]);
Route::get("/foods",[AdminController::class,"food"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteusers"]);
Route::post("/uploadfood",[AdminController::class,"upload"]);
Route::get("/deletefood/{id}",[AdminController::class,"deletefood"]);
Route::post("/updatemeal/{id}",[AdminController::class,"updatemeal"]);
Route::post("/checkouts",[HomeController::class,"checkouts"]);


Route::get("/cart",[HomeController::class,"viewcart"]);
Route::get("/order-received",[HomeController::class,"receipt"]);
Route::delete("/destroy/{id}",[HomeController::class,"destroy"]);
Route::post("/update",[HomeController::class,"update"]);
Route::get("/add-to-cart/{id}",[HomeController::class,"addToCart"]);
Route::get("/profile",[HomeController::class,"profile"]);
Route::get("/order",[HomeController::class,"order"]);
Route::post("/order-tracking",[HomeController::class,"tracking"]);
// The route that the button calls to initialize payment
Route::post('/pay', [HomeController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/order-recieved/callback', [HomeController::class, 'callback'])->name('callback');




Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');


// Laravel 5.1.17 and above
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');


