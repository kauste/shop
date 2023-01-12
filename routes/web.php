<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\FrontController;


Route::get('/', function () {
    return view('welcome');
});

//back
Route::middleware('role:admin')->group(function () {
    Route::get('/shops', [ShopController::class, 'index'])->name('shops');
    Route::get('/shop-create', [ShopController::class, 'create'])->name('shop-create');
    Route::post('/shop-store', [ShopController::class, 'store'])->name('shop-store');
    Route::get('/shop-edit/{shop}', [ShopController::class, 'edit'])->name('shop-edit');
    Route::put('/shop-update/{shop}', [ShopController::class, 'update'])->name('shop-update');
    Route::delete('/shop-delete/{shop}', [ShopController::class, 'destroy'])->name('shop-delete');

    Route::get('/clothes', [ClothController::class, 'index'])->name('clothes');
    Route::get('/cloth-create', [ClothController::class, 'create'])->name('cloth-create');
    Route::post('/cloth-store', [ClothController::class, 'store'])->name('cloth-store');
    Route::get('/cloth-edit/{cloth}', [ClothController::class, 'edit'])->name('cloth-edit');
    Route::put('/cloth-update/{cloth}', [ClothController::class, 'update'])->name('cloth-update');
    Route::delete('/cloth-delete/{cloth}', [ClothController::class, 'destroy'])->name('cloth-delete');
});
//front
Route::middleware('role:user')->group(function () {
    Route::get('/shop-list', [FrontController::class, 'shopList'])->name('shop-list');
    Route::get('/clothes-list', [FrontController::class, 'clothesList'])->name('clothes-list');
    Route::put('/rate/{cloth}', [FrontController::class, 'rate'])->name('rate');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
