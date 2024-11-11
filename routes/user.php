<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeCarController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\IntroduceController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Route;


Route::name('frontend.')->group(function () {

    // route::controller(HomeController::class)->group(function () {
    //     route::get('/', 'home')->name('home');
    // });

    route::get('/', [HomeController::class, 'home'])->name('home');
    route::get('gioi-thieu', [IntroduceController::class, 'introduce'])->name('introduce');
    route::get('dich-vu/{slug?}', [ServiceController::class, 'service'])->name('service');
    route::get('lien-he', [ContactController::class, 'contact'])->name('contact');
    route::get('dat-xe', [BookingController::class, 'booking'])->name('booking');
    route::get('san-pham/{slug?}', [ProductController::class, 'product'])->name('product');
});
