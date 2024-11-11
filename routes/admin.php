<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeCarController;
use Illuminate\Support\Facades\Route;


Route::name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('type-car', TypeCarController::class);
});
