<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Models\Category;

Route::get('admin/home', function () {
    return view('admin.home');
})->name('admin.home');

// Ruta per a la gestió de comandes en el backend
Route::resource('admin/order', App\Http\Controllers\Admin\OrderController::class);

// Injecció de dependències per a productes
Route::bind('product', function($slug){
    return \App\Models\Product::where('slug', $slug)->first();
});

// Injecció de dependències per a categories
Route::bind('category', function ($category) {
    return Category::find($category);
});

// Rutes generals de la botiga
Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('product/{slug}', [StoreController::class, 'show'])->name('product-detail');

// Rutes de la cistella (CRUD)
Route::get('/cart/show', [CartController::class, 'show'])->name('cart-show');
Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart-add');
Route::get('/cart/trash', [CartController::class, 'trash'])->name('cart-trash');
Route::get('/cart/delete/{product}', [CartController::class, 'delete'])->name('cart-delete');
Route::get('/cart/update/{product}/{quantity?}', [CartController::class, 'update'])->name('cart-update');

// Autenticació
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

// Detall de la comanda (Protegit)
Route::get('/order-detail', [CartController::class, 'OrderDetail'])
    ->middleware('auth')
    ->name('order-detail');

// Rutes de PayPal
Route::get('payment', [PaypalController::class, 'postPayment'])->name('payment');

Route::get('payment/status', [PaypalController::class, 'getPaymentStatus'])->name('payment.status');

Route::resource('admin/category', CategoryController::class);

Route::resource('admin/product', App\Http\Controllers\Admin\ProductController::class);

Route::resource('admin/user', App\Http\Controllers\Admin\UserController::class);

Route::view('/sobre-nosaltres', 'sobre-nosaltres')->name('sobre');

Route::view('/contacte', 'contacte')->name('contacte');

Route::get('/payment-new', [App\Http\Controllers\PaymentController::class, 'create']);

Route::get('/payment-new/status', [App\Http\Controllers\PaymentController::class, 'status'])->name('payment-new.status');



