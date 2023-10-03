<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;


Route::prefix('/v1')->group(function () {

    Route::get('/home', [ApiController::class, 'categoriesList']);

    Route::get('/home/{id}/stores', [ApiController::class, 'storesList']);

    Route::get('/store/{id}', [ApiController::class, 'getStoreById']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
