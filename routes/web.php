<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;

Route::get('/', [BerandaController::class, 'index'])->name('home');

// Route untuk Halaman Beranda
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReturnController;

use App\Http\Controllers\DashboardExportController;

Route::get('/dashboard/export-pdf', [DashboardExportController::class, 'exportPDF'])->name('dashboard.export.pdf');
Route::get('/dashboard/export-excel', [DashboardExportController::class, 'exportExcel'])->name('dashboard.export.excel');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('items', ItemController::class);
Route::resource('returns', ProductReturnController::class);
Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

use App\Http\Controllers\ProductReturnController;

Route::get('/returns', 'App\Http\Controllers\ProductReturnController@index')->name('returns.index');
Route::get('/returns/create', 'App\Http\Controllers\ProductReturnController@create')->name('returns.create');
Route::post('/returns', 'App\Http\Controllers\ProductReturnController@store')->name('returns.store');

use App\Http\Controllers\StockInController;

// Route untuk Barang Masuk
Route::get('/stock-in', [StockInController::class, 'index'])->name('stock-in.index');
Route::get('/stock-in/create', [StockInController::class, 'create'])->name('stock-in.create');
Route::post('/stock-in', [StockInController::class, 'store'])->name('stock-in.store');
Route::get('/stock-in/{id}', [StockInController::class, 'show'])->name('stock-in.show');
Route::get('/stock-in/{id}/edit', [StockInController::class, 'edit'])->name('stock-in.edit');
Route::put('/stock-in/{id}', [StockInController::class, 'update'])->name('stock-in.update');
Route::delete('/stock-in/{id}', [StockInController::class, 'destroy'])->name('stock-in.destroy');

use App\Http\Controllers\ReportController;

Route::get('/reports', [ReportController::class, 'index'])->name('laporan.index');
Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('laporan.export-excel');
Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])->name('laporan.export-pdf');

use App\Http\Controllers\SupplierController;

Route::resource('suppliers', SupplierController::class);

use App\Http\Controllers\StockOutController;

Route::resource('stockout', StockOutController::class);
Route::resource('stock-out', StockOutController::class)->names('stockout');


















