<?php

use App\Http\Controllers\ApiLogController;
use App\Http\Controllers\NumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiLogger;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => [ApiLogger::class]], function () {
    // Logs... Only for logged users
    /* Route::group(['middleware' => 'auth:sanctum'], function () { */
        Route::get('/logs', [ApiLogController::class, 'list'])->name("logs.list");
        Route::delete('/logs/refresh', [ApiLogController::class, 'refresh'])->name('logs.refresh');
    /* }); */

    Route::post('/numbers/get-perfect-numbers',[NumberController::class,'get_perfect_numbers'])->name('numbers.perfects');
});

