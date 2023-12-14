<?php

use App\Http\Controllers\DataPerdinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusPerdinController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [LoginController::class, 'apiLogin']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'apiLogout']);

Route::post('/data-perdin', [DataPerdinController::class, 'apiDataPerdin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/status-perdin/approve', [StatusPerdinController::class, 'apiApprove']);
    Route::put('/status-perdin/tolak', [StatusPerdinController::class, 'apiTolak']);
});

Route::get('/get-users', [UserController::class, 'getUser']);
