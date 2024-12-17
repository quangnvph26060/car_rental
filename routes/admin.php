<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\TypeCarController;
use App\Http\Controllers\Admin\BrandCarController;
use App\Http\Controllers\Admin\ImageCarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SgoContactController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\ServiceCommitmentController;

$objs = [
    'type-car' => TypeCarController::class,
    'brand-car' =>  BrandCarController::class,
    'car' => CarController::class,
];
// Route::get('/login', function () {
//     return view('login.index');
// })->name('form_login');

// Route::post('', [AuthController::class, 'login'])->name('login');
route::middleware('guest')->group(function () {
    route::get('login', [AuthController::class, 'login'])->name('login');
    route::post('login', [AuthController::class, 'authenticate']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['checkLogin', 'checkRole:1,2'])->name('admin.')->group(function () use ($objs) {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources($objs);
    Route::post('car/change-status', [CarController::class, 'changeStatus'])->name('car.change.status');
    Route::post('car/change-is-favorite', [CarController::class, 'activeFavorite'])->name('car.change.favorite');

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
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
        Route::get('/edit', [ReviewController::class, 'edit'])->name('edit');
        Route::post('/update', [ReviewController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ReviewController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('colors')->name('colors.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::post('/store', [ColorController::class, 'store'])->name('store');
        Route::get('/edit', [ColorController::class, 'edit'])->name('edit');
        Route::post('/update', [ColorController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ColorController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/contact-info', [SgoContactController::class, 'getContactInfo'])->name('getContactInfo');
        Route::post('/update-contact-info', [SgoContactController::class, 'updateContactInfo'])->name('updateContactInfo');
    });
    Route::prefix('config')->name('config.')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('index');
        Route::post('/update-config', [ConfigController::class, 'update'])->name('update');
        Route::post('/maintenance', [ConfigController::class, 'maintenance'])->name('maintenance');
    });

    route::controller(AlbumController::class)->prefix('album')->name('album.')->group(function () {
        route::get('/', 'index')->name('index');
        route::get('create', 'create')->name('create');
        route::post('create', 'store');
        route::get('edit/{album}', 'edit')->name('edit');
        route::put('edit/{album}', 'update')->name('update');
        route::get('destroy/{album}', 'destroy')->name('destroy');
    });


    route::get('/booking/request', [SgoContactController::class, 'bookingRequest'])->name('booking.request');
    route::post('/booking/request', [SgoContactController::class, 'bookingEmail'])->name('booking.email');


    Route::get('/images/car/{slug?}', [ImageCarController::class, 'index'])->name('images.car.index');
    Route::post('/images/car/store', [ImageCarController::class, 'store'])->name('images.car.store');
    Route::delete('/delete-file/car/{id}', [ImageCarController::class, 'destroy'])->name('images.car.destroy');

    Route::get('account', [AdminController::class, 'index'])->name('admin.config');
    Route::post('account', [AdminController::class, 'update'])->name('admin.update');
});


Route::post('upload', function (Request $request) {
    if ($request->hasFile('upload')) {
        $image = $request->file('upload');
        $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put('images' . '/' . $filename, file_get_contents($image->getPathName()));
        $path = 'images' . '/' . $filename;
        $url = Storage::url($path);
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $msg = 'Image uploaded successfully';

        return "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg');</script>";
    }
})->name('ckeditor.upload');
