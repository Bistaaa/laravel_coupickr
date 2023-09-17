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

Route::post('/category/{category_id}/store/dish-store', [DashboardController::class, 'storeStore'])
    ->middleware(['auth'])
    ->name('store.store');

Route::get('/category/{category_id}/store/{store_id}/manage', [DashboardController::class, 'editStore'])
    ->middleware(['auth', 'verified'])
    ->name('store.edit');

Route::post('/category/{category_id}/store/{store_id}/toggle-visibility', [DashboardController::class, 'toggleVisibilityStore'])
    ->middleware(['auth', 'verified'])
    ->name('store.toggleVisibility');





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





Route::put('/store/{id}/update', [DashboardController::class, 'updateStore'])
    ->middleware(['auth', 'verified'])
    ->name('store.update');

Route::get('/dashboard/category/{category_id}/store-create', [DashboardController::class, 'createStore'])
    ->middleware(['auth'])
    ->name('store.create');

Route::delete('/store/{id}/delete', [DashboardController::class, 'deleteStore'])
    ->middleware(['auth', 'verified'])
    ->name('store.delete');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
