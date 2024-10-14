<?php

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\RoleMiddleWare;
use App\Http\Controllers\SitemapController;
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
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::middleware(['auth'])->group(function(){
});
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('lang-locale');
