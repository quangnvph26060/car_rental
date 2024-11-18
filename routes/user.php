<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TypeCarController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\IntroduceController;


Route::name('frontend.')->group(function () {

    route::get('/', [HomeController::class, 'home'])->name('home');
    route::get('gioi-thieu', [IntroduceController::class, 'introduce'])->name('introduce');
    route::get('dich-vu/{slug?}', [ServiceController::class, 'service'])->name('service');
    route::get('lien-he', [ContactController::class, 'contact'])->name('contact');
    route::get('dat-xe', [BookingController::class, 'booking'])->name('booking');
    route::get('san-pham/{slug?}', [ProductController::class, 'product'])->name('product');
    route::get('tin-tuc/{slug?}', [NewsController::class, 'blog'])->name('blog');


    route::post('booking', [BookingController::class, 'store'])->name('booking.store');

    route::get('mau-sac/{slug}', [NewsController::class, 'color'])->name('color');

    Route::post('/load-more-cars', [ProductController::class, 'loadMoreCars'])->name('loadMoreCars');
});
