<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ======================== Authentication Routes ========================

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ======================== Home Routes ========================

Route::get("/", [HomeController::class, "index"])->name('home');
Route::get("/checkout", [HomeController::class, "checkout"]);
Route::get("/redirects", [HomeController::class, "redirects"]);

// ======================== Profile & Cart Routes ========================

Route::get("/cart", [HomeController::class, "viewcart"]);
Route::get("/profile", [HomeController::class, "profile"]);
Route::get('/order', [HomeController::class, 'order'])->name('order');
Route::post('/order-tracking', [HomeController::class, 'tracking'])->name('order.tracking');

// ======================== Logout Routes ========================

// Logout for both Admin and User
Route::get("/logout", [HomeController::class, "logout"])->name('logout.home');
Route::get("/admin/logout", [AdminController::class, "logout"])->name('logout.admin');

// ======================== Order Routes ========================

Route::get("/order-received", [HomeController::class, "receipt"]);
Route::post("/update-order", [HomeController::class, "update"]);

// ======================== Add-to-Cart Routes ========================

Route::post('/add-to-cart/{id}', [HomeController::class, 'addToCart']);
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');

// ======================== Payment Routes ========================

// Payment Initialization
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

// Payment Callback
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

// ======================== Admin Routes ========================
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin Food Management
Route::get("/updatefood/{id}", [AdminController::class, "updatefood"]);
Route::get("/foods", [AdminController::class, "food"]);
Route::get("/admin/orders", [AdminController::class, "orders"]);
Route::post("/uploadfood", [AdminController::class, "upload"]);
Route::get("/deletefood/{id}", [AdminController::class, "deletefood"]);
Route::post("/updatemeal/{id}", [AdminController::class, "updatemeal"]);
Route::get('/deleteorder/{id}', [AdminController::class, 'deleteOrder'])->name('delete.order');

// Admin User Management
Route::get("/users", [AdminController::class, "user"]);
Route::get("/deleteuser/{id}", [AdminController::class, "deleteusers"]);

// Admin Order Management
Route::get('/granted-orders', [AdminController::class, 'grantedOrders'])->name('granted.orders');
Route::get('/deleteorder/{id}', [AdminController::class, 'deleteOrder'])->name('delete.order');
// Protect admin routes with 'auth' and 'admin' middleware

// Routes for payment methods
Route::post('/checkouts/cod', [HomeController::class, 'handleCOD']);


// Cart Management
Route::delete('/destroy/{id}', [HomeController::class, 'destroy'])->name('cart.destroy');
Route::get('/payment-gateway', function () {
    return view('payment-page');
});

Route::post('/checkouts/card', [PayPalController::class, 'handleCardPayment'])->name('card.checkout');

// PayPal specific routes
Route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.cancel');

Route::post('/clear-cart', function () {
    Cart::clear(); // Clear all items in the cart
    return response()->json(['status' => 'Cart cleared']);
});