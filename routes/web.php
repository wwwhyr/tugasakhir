<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatExportController;
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
Route::get('export-excel', [MasyarakatExportController::class, 'exportExcel'])->name('export.excel');
Route::get('export-csv', [MasyarakatExportController::class, 'exportCsv'])->name('export.csv');
Route::get('export-pdf', [MasyarakatExportController::class, 'exportPdf'])->name('export.pdf');
Route::get('masyarakat/print', [MasyarakatController::class, 'print'])->name('masyarakat.print');

Route::resource('masyarakat', MasyarakatController::class);
Route::resource('petugas', PetugasController::class);



Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
    


});
require __DIR__.'/auth.php';
