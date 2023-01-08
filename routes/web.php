<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function(){

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tags');
        Route::get('/create', [TagController::class, 'create'])->name('tags.create');
        Route::post('/store', [TagController::class, 'store'])->name('tags.store');
        Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
        Route::post('/update/{id}', [TagController::class, 'update'])->name('tags.update');
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
    });
});
