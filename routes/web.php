<?php

use App\Http\Controllers\guest\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\owner\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Guest show the all products route
 */
Route::get('/', [GuestController::class,'index'])->name('home');
Route::get('/product/booking/{id}',[GuestController::class,'bookingView'])->name('bookingView');
Route::post('/order/confirm',[GuestController::class,'getOrder'])->name('getOrder');

Route::get('/dashboard',[ProductsController::class,'index'])->middleware(['auth'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

/**
 *  Products route for owners
 */
 Route::middleware('auth')->group(function () {
    Route::get('/products',[ProductsController::class,'getProducts'])->name('product.dataTable');
    Route::get('/add/product',[ProductsController::class,'add'])->name('product.add');
    Route::post('/store',[ProductsController::class,'store'])->name('product.store');
    Route::get('/edit/{id}',[ProductsController::class,'edit'])->name('product.edit');
    Route::post('/update',[ProductsController::class,'update'])->name('product.update');
    Route::post('/delete',[ProductsController::class,'delete'])->name('product.delete');
 });



require __DIR__.'/auth.php';
