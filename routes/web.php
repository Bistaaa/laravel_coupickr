<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.home');

Route::get('/category/{id}', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('category.show');

Route::post('/category/dish-store', [DashboardController::class, 'storeCategory'])
    ->middleware(['auth'])
    ->name('category.store');

Route::get('/category/{id}/manage', [DashboardController::class, 'editCategory'])
    ->middleware(['auth', 'verified'])
    ->name('category.edit');

Route::post('/category/{id}/toggle-visibility', [DashboardController::class, 'toggleVisibility'])
    ->middleware(['auth', 'verified'])
    ->name('category.toggleVisibility');



Route::get('/category/store-show/{id}', [DashboardController::class, 'showStores'])
    ->middleware(['auth', 'verified'])
    ->name('store.show');




/////////////////////////
//CRUD CATEGORIE
/////////////////////////

Route::put('/category/{id}/update', [DashboardController::class, 'updateCategory'])
    ->middleware(['auth', 'verified'])
    ->name('category.update');

Route::get('/dashboard/category-create', [DashboardController::class, 'createCategory'])
    ->middleware(['auth'])
    ->name('category.create');

Route::delete('/category/{id}/delete', [DashboardController::class, 'deleteCategory'])
    ->middleware(['auth', 'verified'])
    ->name('category.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
