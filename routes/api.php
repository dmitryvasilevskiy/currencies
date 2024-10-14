<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('currencies', [CurrencyController::class, 'index']);
Route::get('currencies/{date}', [CurrencyController::class, 'show']);
