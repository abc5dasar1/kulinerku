<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeDashboard;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeDashboard::class, 'index']);
Auth::routes();


Route::resource('dashboard_fe', FeDashboard::class);
Route::get('mutation', [App\Http\Controllers\FeDashboard::class, 'mutation'])->name('fe.mutation');
Route::get('history', [App\Http\Controllers\FeDashboard::class, 'history'])->name('fe.history');
Route::get('shop', [App\Http\Controllers\FeDashboard::class, 'shop'])->name('fe.shop');
Route::get('cart', [App\Http\Controllers\FeDashboard::class, 'cart'])->name('fe.cart');
Route::post('addtocart', [App\Http\Controllers\TransactionController::class, 'addtoCart'])->name('addtoCart');
Route::delete('/deleteKart/{id}', [App\Http\Controllers\TransactionController::class, 'deleteKart'])->name('deleteKart');
Route::post('/topupNow', [App\Http\Controllers\WalletController::class, 'topupNow'])->name('topupNow');
Route::post('/payNow', [App\Http\Controllers\TransactionController::class, 'payNow'])->name('payNow');
Route::get('/download/{order_id}', [App\Http\Controllers\TransactionController::class, 'download'])->name('download');

// Route::get('admin/product/create', [App\Http\Controllers\ProductController::class, 'add'])->name('admin.product.create');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/index', [AdminDashboard::class, 'index'])->name('admin.index');
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('dashboard', AdminDashboard::class);
});


Route::middleware(['auth', 'user-access:members'])->group(function () {
});
