<?php

use App\Http\Controllers\Admin\BrandCarController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeCarController;
use Illuminate\Support\Facades\Route;

$objs = [
    'type-car' => TypeCarController::class,
    'brand-car' =>  BrandCarController::class,
    'car' => CarController::class
];

Route::name('admin.')->group(function () use ($objs) {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources($objs);
    Route::post('car/change-status' , [CarController::class , 'changeStatus'])->name('car.change.status');
});
