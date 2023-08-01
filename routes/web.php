<?php

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

Route::get('/', [
    \App\Http\Controllers\IndexController::class, 'index'
]);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [
    \App\Http\Controllers\LoginController::class, 'login'
]);

Route::get('/logout', [
    \App\Http\Controllers\LoginController::class, 'logout'
]);
Route::middleware(['auth'])->group(function () {
    Route::get('modules/create', function () {
        return view('modules.create');
    });

    Route::post('modules', [
        \App\Http\Controllers\ModuleController::class, 'create'
    ]);

    Route::get('modules', function () {
        return view('modules.list');
    })->name('modules-list');

    Route::get('modules/{module}', [
        \App\Http\Controllers\ModuleController::class, 'show'
    ]);

    Route::get('history/{module}', [
        \App\Http\Controllers\HistoryController::class, 'showByModule'
    ]);
});
