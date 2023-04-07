<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;   

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
Route::get('/home', function() {
    return view('home');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('admin')->middleware('role:super-admin|admin|editor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product 

    Route::get('/product', [ProductController::class, 'index'])->name('productIndex');
    Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');
    Route::post('/product/create', [ProductController::class, 'store'])->name('productStore');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('productView');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('productUpdate');
    Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('productDelete');

});

