<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\OverseerController;
use App\Models\Wilayah;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//routes penyewa
Route::get('/hosts', [HostController::class, 'index'])->name('host.index');
Route::get('/hosts/create', [HostController::class, 'create'])->name('host.create');
Route::post('/hosts', [HostController::class, 'store'])->name('host.store');
Route::get('/hosts/{host}', [HostController::class, 'show'])->name('host.show');
Route::get('/hosts/{host}/edit', [HostController::class, 'edit'])->name('host.edit');
Route::put('/hosts/{host}', [HostController::class, 'update'])->name('host.update');
Route::delete('/hosts/{host}', [HostController::class, 'destroy'])->name('host.destroy');

//routes aset
Route::get('/assets', [AssetController::class, 'index'])->name('asset.index');
Route::get('/assets/create', [AssetController::class, 'create'])->name('asset.create');
Route::get('/assets/earning', [AssetController::class,'earning'])->name('asset.earning');
Route::get('/assets/export', [AssetController::class, 'export'])->name('asset.export');
Route::get('/asset/export-details', [AssetController::class, 'exportDetails'])->name('asset.exportDetails');
Route::post('/assets', [AssetController::class, 'store'])->name('asset.store');
Route::get('/assets/{asset}', [AssetController::class, 'show'])->name('asset.show');
Route::get('/assets/{asset}/edit', [AssetController::class, 'edit'])->name('asset.edit');
Route::put('/assets/{asset}', [AssetController::class, 'update'])->name('asset.update');
Route::delete('/assets/{asset}', [AssetController::class, 'destroy'])->name('asset.destroy');
Route::get('/assets/{asset}', [AssetController::class, 'details'])->name('asset.details');
Route::get('/assets/{asset}/edited', [AssetController::class, 'edited'])->name('asset.edited');

//Kalau aset meminta form untuk menambahkan penghuni jika aset tak berpenghuni kosong:
    // Route::post('/hosts/{asset}', [HostController::class, 'store'])->name('host.store');
    // Route::get('/hosts/create/{asset}', [HostController::class, 'create'])->name('host.create');


//Routes Wilayah
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
Route::get('/wilayah/create', [WilayahController::class, 'create'])->name('wilayah.create');
Route::post('/wilayah', [WilayahController::class, 'store'])->name('wilayah.store');
Route::get('/wilayah/{wilayah}', [WilayahController::class, 'show'])->name('wilayah.show');
Route::get('/wilayah/{wilayah}/edit', [WilayahController::class, 'edit'])->name('wilayah.edit');
Route::put('/wilayah/{wilayah}', [WilayahController::class, 'update'])->name('wilayah.update');
Route::delete('/wilayah/{wilayah}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');
Route::get('/wilayah/{wilayah}', [WilayahController::class, 'details'])->name('wilayah.details');
Route::get('/wilayah/{wilayah}/edited', [WilayahController::class, 'edited'])->name('wilayah.edited');

//Routes Tiket
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
Route::get('/tiket/create', [TiketController::class, 'create'])->name('tiket.create');
Route::post('/tiket', [TiketController::class, 'store'])->name('tiket.store');
Route::get('/tiket/{tiket}', [TiketController::class, 'show'])->name('tiket.show');
Route::get('/tiket/{tiket}/edit', [TiketController::class, 'edit'])->name('tiket.edit');
Route::put('/tiket/{tiket}', [TiketController::class, 'update'])->name('tiket.update');
Route::delete('/tiket/{tiket}', [TiketController::class, 'destroy'])->name('tiket.destroy');
Route::get('/tiket/{tiket}', [TiketController::class, 'details'])->name('tiket.details');
Route::get('/tiket/{tiket}/edited', [TiketController::class, 'edited'])->name('tiket.edited');

//Routes Overseer
Route::get('/overseer', [OverseerController::class, 'index'])->name('overseer.index');
Route::get('/overseer/create', [OverseerController::class, 'create'])->name('overseer.create');
Route::post('/overseer', [OverseerController::class, 'store'])->name('overseer.store');
Route::get('/overseer/{overseer}', [OverseerController::class, 'show'])->name('overseer.show');
Route::get('/overseer/{overseer}/edit', [OverseerController::class, 'edit'])->name('overseer.edit');
Route::put('/overseer/{overseer}', [OverseerController::class, 'update'])->name('overseer.update');
Route::delete('/overseer/{overseer}', [OverseerController::class, 'destroy'])->name('overseer.destroy');
Route::get('/overseer/{overseer}', [OverseerController::class, 'details'])->name('overseer.details');
Route::get('/overseer/{overseer}/edited', [OverseerController::class, 'edited'])->name('overseer.edited');