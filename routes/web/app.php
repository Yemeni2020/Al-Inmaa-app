<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AboutPage;
use App\Livewire\PostDetails;
use App\Livewire\OurServices;
use App\Livewire\ServiceDetails;
use App\Livewire\OurProducts;
use App\Livewire\UsagePolicy;
use App\Livewire\PrivacyPolicy;
use App\Livewire\TermsOfService;
use App\Livewire\ContactUs;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;


Route::get('/post/{postId}', PostDetails::class)->name('pages.post-detail');
Route::get('/', [HomeController::class, 'homePage'])->name('pages.guest-home-page');
// }});
Route::get('/about', AboutPage::class)->name('about');

Route::get('/services', OurServices::class)->name('services');
Route::get('/products', OurProducts::class)->name('products');
Route::get('/service-details/{service}', ServiceDetails::class)->name('service-details');
Route::get('/usage-policy', UsagePolicy::class)->name('usage-policy');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('/terms-of-service', TermsOfService::class)->name('terms-of-service');
Route::get('/contact-us', ContactUs::class)->name('contact-us');

// Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
