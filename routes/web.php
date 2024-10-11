<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\RoleMiddleWare;
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
use App\Http\Controllers\BannersController;
use App\Http\Controllers\AdminAboutUsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\PostController;


// Auth::routes();

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

// });

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group( function () {
    Route::get('posts/list', [PostController::class, 'index'])->name('admin.posts.app-posts-list');
    Route::get('posts/create', [PostController::class, 'create'])->name('admin.posts.app-posts-create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('posts/{post}/update', action: [PostController::class, 'update'])->name('admin.posts.update');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.app-posts-edit');
    Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});

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





Route::middleware(['auth'])->group(function(){
});
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('lang-locale');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group( function () {
    // User Route
    Route::get('users/list', [UserController::class, 'index'])->name('admin.users.app-users-list');
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('users/{user}/profile', [UserController::class,'show'])->name('admin.users.app-user-profile');
    Route::put('admin/users/{user}/attach', [UserController::class,'attach'])->name('user.role.attach');
    Route::put('admin/users/{user}/detach', [UserController::class,'detach'])->name('user.role.detach');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('pages.dashboards');

});

// Admin Routes (With Middleware for Authentication)
Route::middleware(['auth'] )->group(function () {
    Route::get('/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
});
Route::middleware(['auth'] )->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    Route::put('/role/{role}/attach', [RoleController::class,'attach'])->name('user.premission.attach');
    Route::put('/role/{role}/detach', [RoleController::class,'detach'])->name('user.premission.detach');
    // Route::put('admin/users/{user}/detach', [UserController::class,'detach'])->name('user.role.detach');
});
