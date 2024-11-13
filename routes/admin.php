<?php

use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\BrandCarController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageCarController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceCommitmentController;
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
    Route::get('/benefits/edit', [BenefitController::class, 'edit'])->name('benefits.edit');
    Route::post('/benefits/update', [BenefitController::class, 'update'])->name('benefits.update');
    Route::delete('/benefits/delete/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');
    Route::post('/benefits/change-status', [BenefitController::class, 'changeStatus'])->name('benefits.change.status');

    Route::get('/service-commitment', [ServiceCommitmentController::class, 'index'])->name('service-commitment.index');
    Route::post('/service-commitment/store', [ServiceCommitmentController::class, 'store'])->name('service-commitment.store');
    Route::get('/service-commitment/edit', [ServiceCommitmentController::class, 'edit'])->name('service-commitment.edit');
    Route::post('/service-commitment/update', [ServiceCommitmentController::class, 'update'])->name('service-commitment.update');
    Route::delete('/service-commitment/delete/{id}', [ServiceCommitmentController::class, 'destroy'])->name('service-commitment.destroy');

    Route::prefix('categories-post')->name('categories-post.')->group(function () {
        Route::get('/', [CategoryPostController::class, 'index'])->name('index');
        Route::post('/store', [CategoryPostController::class, 'store'])->name('store');
        Route::get('/edit', [CategoryPostController::class, 'edit'])->name('edit');
        Route::post('/update', [CategoryPostController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryPostController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit', [PostController::class, 'edit'])->name('edit');
        Route::post('/update', [PostController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('destroy');
        Route::post('/change-status', [PostController::class, 'changeStatus'])->name('change.status');
    });

    Route::get('/images/car/{slug?}', [ImageCarController::class, 'index'])->name('images.car.index');
    Route::post('/images/car/store', [ImageCarController::class, 'store'])->name('images.car.store');
    Route::delete('/delete-file/car/{id}', [ImageCarController::class, 'destroy'])->name('images.car.destroy');
});
