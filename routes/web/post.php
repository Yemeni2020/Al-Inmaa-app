<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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


