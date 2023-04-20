<?php

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Admin\UserController;

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

Route::prefix('admin')->middleware(['role:super-admin|admin|editor', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product 

    Route::get('/product', [ProductController::class, 'index'])->name('productIndex');
    Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');
    Route::post('/product/store', [ProductController::class, 'store'])->name('productStore');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('productView');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('productUpdate');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('productDelete');

    // User 

    Route::get('/user', [UserController::class, 'index'])->name('userIndex');
    Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('/user/store', [UserController::class, 'store'])->name('userStore');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('userView');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('userDelete');

    Route::prefix('setting')->group(function() {

        // Permissions 
        Route::get('/permission', [PermissionController::class, 'get_all_roles'])->name('permissionIndex');
        Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permissionEdit');
        Route::post('/permission/give', [PermissionController::class, 'grant_permission'])->name('grantPermission');

        // General Setting 

        Route::get('/general', [GeneralSettingController::class, 'index'])->name('generalIndex');
        Route::get('/general/edit/{id}', [GeneralSettingController::class, 'edit'])->name('generalEdit');
        Route::put('/general/edit/{id}', [GeneralSettingController::class, 'update'])->name('generalUpdate');

        // Account 

        Route::get('/account/{id}', [AccountController::class , 'show'])->name('accountShow');
        Route::get('/account/edit/{id}', [AccountController::class , 'edit'])->name('accountEdit');
        Route::put('/account/edit/{id}', [AccountController::class , 'update'])->name('accountUpdate');
    });

    // Download QR 

    Route::post('/productqr/download/{id}', [ProductController::class, 'download'])->name('downloadQr');

    // change State 

    Route::post('/changeProductState', [ProductController::class, 'change_state'])->name('changeProductState');
    Route::post('/changeUserState', [UserController::class, 'change_state'])->name('changeUserState');
});

// Frontend 

Route::get('/', [FrontendProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [FrontendProductController::class, 'show'])->name('productDetail');

Route::get('/test/splide', function() {
    return view('test.splide');
});

