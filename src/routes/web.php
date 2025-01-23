<?php

use Illuminate\Support\Facades\Route;
use TechGhor\LaravelLicenseManager\Http\Controllers\LicenseController;

Route::get('/license/payment', [LicenseController::class, 'payment'])->name('license.payment');

