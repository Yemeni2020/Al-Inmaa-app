<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\AdminAboutUsController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group( function () {
    Route::get('banner/list', [BannersController::class,'create'])->name('admin.banner.extra-banner-create');
    Route::post('banner', [BannersController::class,'store'])->name('banner.store');
    Route::delete('banner/{banner}/destroy', [BannersController::class, 'destroy'])->name('banner.destroy');

    Route::patch('about_us', [AdminAboutUsController::class,'update'])->name('admin.extra-about-us.update');
    Route::get('about_us', [AdminAboutUsController::class,'edit'])->name('admin.extra-about-us');
    });
