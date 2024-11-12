<?php

use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\BrandCarController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeCarController;
use Illuminate\Support\Facades\Route;

$objs = [
    'type-car' => TypeCarController::class,
    'brand-car' =>  BrandCarController::class,
    'car' => CarController::class,
];

Route::name('admin.')->group(function () use ($objs) {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources($objs);
    Route::post('car/change-status', [CarController::class, 'changeStatus'])->name('car.change.status');

    Route::get('/benefits', [BenefitController::class, 'index'])->name('benefits.index');
    Route::post('/benefits/store', [BenefitController::class, 'store'])->name('benefits.store');
    Route::get('/edit', [BenefitController::class, 'edit'])->name('benefits.edit');
    Route::post('/update', [BenefitController::class, 'update'])->name('benefits.update');
    Route::delete('/benefits/delete/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');
    Route::post('benefits/change-status', [BenefitController::class, 'changeStatus'])->name('benefits.change.status');
});
