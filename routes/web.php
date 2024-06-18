<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\TagController;
    use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/about', AboutController::class)->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => '/category', 'middleware' => 'auth:web'], function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group(['prefix' => '/tag', 'middleware' => 'auth:web'], function (){
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/index', [TagController::class, 'index'])->name('tag.index');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/{id}/update', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/{id}/destroy', [TagController::class, 'destroy'])->name('tag.destroy');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
