<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatExportController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GrafikStatusGiziController;
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
Route::post('/masyarakat/import', [MasyarakatController::class, 'import'])->name('masyarakat.import');
Route::get('export-excel', [MasyarakatExportController::class, 'exportExcel'])->name('export.excel');
Route::get('export-csv', [MasyarakatExportController::class, 'exportCsv'])->name('export.csv');
Route::get('export-pdf', [MasyarakatExportController::class, 'exportPdf'])->name('export.pdf');
Route::get('masyarakat/print', [MasyarakatController::class, 'print'])->name('masyarakat.print');

// Pastikan tidak ada route yang tumpang tindih
Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::post('/masyarakat/store', [MasyarakatController::class, 'store'])->name('masyarakat.store');

Route::get('/dashboard/stunting-data', [DashboardController::class, 'getStuntingData'])->name('dashboard.stunting-data');
Route::get('/daerahs/desa/{kecamatan}', [DaerahController::class, 'getDesaByKecamatan'])->name('daerahs.getDesaByKecamatan');
Route::resource('daerahs', DaerahController::class);

Route::get('/grafik-status-gizi', [GrafikStatusGiziController::class, 'index'])->name('grafik.status_gizi');
Route::get('/grafik/filter', [GrafikStatusGiziController::class, 'filter'])->name('grafik.filter');
Route::get('/get-desa', [MasyarakatController::class, 'getDesa'])->name('getDesa');
Route::get('/update-status', [MasyarakatController::class, 'updateStatus'])->name('masyarakat.updateStatus');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::resource('masyarakat', MasyarakatController::class);
Route::resource('petugas', PetugasController::class);

Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';
