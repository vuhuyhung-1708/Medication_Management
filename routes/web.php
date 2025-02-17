<?php

//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\MedicineController;
//use App\Http\Controllers\SaleController;
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\UserController;
//
//Route::get('/', function () {
//    return view('home.index');
//});
//Route::resource('medicines', MedicineController::class);
//Route::resource('sales', SaleController::class);
//Route::resource('users' , UserController::class);



/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Trang chính

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;


// Hiển thị form đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::resource('medicines', MedicineController::class)->middleware('auth');
Route::resource('sales', SaleController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login']);

// Xử lý đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trang chính sau khi đăng nhập
Route::get('/home', function () {
    return view('home.index');
})->middleware('auth');
