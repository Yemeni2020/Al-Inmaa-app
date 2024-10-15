<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Middleware\RoleMiddleWare;


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
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.destroy');
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
Route::middleware(['auth'] )->group(function () {
 // List all branches
 Route::get('/branches', [BranchController::class, 'index'])->name('admin.branches.index');

 // Display form to create a new branch
 Route::get('/branches/create', [BranchController::class, 'create'])->name('admin.branches.create');

 // Store a new branch
 Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');

 // Display form to edit a branch
 Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('admin.branches.edit');

 // Update a branch
 Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');

 // Delete a branch
 Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
});
Route::middleware(['auth'] )->group(function () {
 // List all brands
 Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands.index');

 // Display form to create a new brand
 Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');

 // Store a new brand
 Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');

 // Display form to edit a brand
 Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');

 // Update a brand
 Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');

 // Delete a brand
 Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});
