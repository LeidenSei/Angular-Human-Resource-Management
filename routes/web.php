<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/Home', [InfoController::class, 'index'])->name('index');

Route::get('/App', [InfoController::class, 'app'])->name('app.index');
Route::post('/App', [InfoController::class, 'insert']);

Route::get('Fix/{id}', [InfoController::class, 'fix'])->name('fix.index');
Route::post('Fix/{id}', [InfoController::class, 'afterFix'])->name('fix.index');


//Product
Route::get('/Product', [ProductController::class, 'index'])->name('Product.index');

