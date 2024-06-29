<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesPersonController;
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

Route::get('/', function () {
    return view('layout/main');
});
Route::get('/oop', function () {
    return view('pages/oop_pages');
})->name('oop');

Route::get('/dependent-dropdown', function () {
    return view('pages/dependent_dropdown_pages');
})->name('dependentDropdown');
Route::get('/selectProv', [ApiController::class, 'getProvinsi'])->name('provinsi');
Route::get('/selectRegenc/{id}', [ApiController::class, 'getKabupaten']);
Route::get('/selectDistrict/{id}', [ApiController::class, 'getKecamatan']);
Route::get('/selectVillage/{id}', [ApiController::class, 'getKelurahan']);

Route::get('/optimasi-query', function () {
    return view('pages/optimasi_query_pages');
})->name('query');

Route::get('/unit-testing', function () {
    return view('pages/unit_testing_pages');
})->name('testing');

Route::get('dashboard', function () {
    return view('layout/dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('grafik.index');
Route::get('/sales-chart-data', [DashboardController::class, 'salesChartData'])->name('dashboard.sales-chart-data');


Route::resource('sales', SalesController::class);
Route::resource('products', ProductController::class);
Route::resource('salespersons', SalesPersonController::class);
