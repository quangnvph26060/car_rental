<?php

use App\Models\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\IntroduceController;


Route::middleware(['maintenance'])->name('frontend.')->group(function () {

    route::post('ajax', [HomeController::class, 'ajax'])->name('ajax');
    route::post('load-more-car' , [ProductController::class , 'loadMoreCarBySlug'])->name('load.car.by.slug');

    route::get('/', [HomeController::class, 'home'])->name('home');
    route::get('gioi-thieu', [IntroduceController::class, 'introduce'])->name('introduce');
    route::get('dich-vu/{slug?}', [ServiceController::class, 'service'])->name('service');
    route::get('hang-xe/{slug?}', [ServiceController::class, 'brand'])->name('brand');
    route::get('lien-he', [ContactController::class, 'contact'])->name('contact');
    route::get('dat-xe', [BookingController::class, 'booking'])->name('booking');
    route::get('san-pham/{slug?}', [ProductController::class, 'product'])->name('product');
    route::get('tin-tuc/{slug?}', [NewsController::class, 'blog'])->name('blog');
    route::get('tin-tuc/danh-muc/{slug?}', [NewsController::class, 'postInCategoryBlog'])->name('category.blog');

    route::post('booking', [BookingController::class, 'store'])->name('booking.store');

    route::get('mau-sac/{slug}', [NewsController::class, 'color'])->name('color');

    Route::post('/load-more-cars', [ProductController::class, 'loadMoreCars'])->name('loadMoreCars');

    route::get('thu-vien-anh', [HomeController::class, 'gallery'])->name('gallery');
});

Route::get('/maintenance', function () {
    $config = Config::first();

    if ($config->maintenance == 0) {
        return view('maintenance');
    }
    return redirect('/');
})->name('maintenance');

