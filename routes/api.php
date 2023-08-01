<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('modules', [
    \App\Http\Controllers\Api\ModuleController::class, 'getAll'
]);

Route::get('modules/failed', [
    \App\Http\Controllers\Api\ModuleController::class, 'getFailed'
]);

Route::get('modules/{module}', [
    \App\Http\Controllers\Api\ModuleController::class, 'getOne'
]);

Route::get('history/{module}', [
    \App\Http\Controllers\Api\HistoryController::class, 'getByModule'
]);
