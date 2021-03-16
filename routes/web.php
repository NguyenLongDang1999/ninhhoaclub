<?php

use Illuminate\Support\Facades\Route;

// Backend
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

// Frontend

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Backend
Route::prefix('administrator')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('getList', [CategoryController::class, 'getList'])->name('admin.category.getList');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('softDeletes/{id}', [CategoryController::class, 'softDeletes'])->name('admin.category.softDeletes');
        Route::get('status/{id}', [CategoryController::class, 'status'])->name('admin.category.status');
        Route::get('recycle', [CategoryController::class, 'recycle'])->name('admin.category.recycle');
        Route::post('multiDestroy', [CategoryController::class, 'multiDestroy'])->name('admin.category.multiDestroy');
    });
});

require __DIR__.'/auth.php';
