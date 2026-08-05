<?php

use Illuminate\Support\Facades\Route;
use TechGhor\LaravelLicenseManager\Http\Controllers\LicenseController;

Route::get('/license/payment', [LicenseController::class, 'payment'])->name('license.payment');
Route::get('/license/install', [LicenseController::class, 'install'])->name('license.install');
Route::post('/license/install', [LicenseController::class, 'installSave'])->name('license.install.save');
Route::get('/license/check', [LicenseController::class, 'manualCheck'])->name('license.check');

