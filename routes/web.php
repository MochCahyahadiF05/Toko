<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustemerController;
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

Route::get('/', function () {
    return view('admin');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//strat
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/custemer',[CustemerController::class,'index'])->name('custemer.index');
Route::post('/custemer/store',[CustemerController::class,'store'])->name('custemer.store');
Route::put('/custemer/update/{id}',[CustemerController::class,'update'])->name('custemer.update');
Route::delete('/custemer/destroy/{id}',[CustemerController::class,'destroy'])->name('custemer.destroy');
