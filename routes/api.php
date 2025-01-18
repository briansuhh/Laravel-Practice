<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\StudentApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('v1/items', ItemApiController::class);
Route::apiResource('v2/attendance', StudentApiController::class);
Route::apiResource('v2/students', StudentApiController::class);
Route::post('/students', [StudentApiController::class, 'store']);