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
Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('dashboard', AdminDashboard::class);
Route::resource('dashboard_fe', FeDashboard::class);
Route::get('shop', [App\Http\Controllers\FeDashboard::class, 'shop'])->name('fe.shop');
Route::post('addtocart', [App\Http\Controllers\TransactionController::class, 'addtoCart'])->name('addtoCart');
// Route::get('admin/product/create', [App\Http\Controllers\ProductController::class, 'add'])->name('admin.product.create');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
