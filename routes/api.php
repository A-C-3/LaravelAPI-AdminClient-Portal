<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'userInfo']);
    Route::post('/clients', [ClientController::class, 'registerClient']);
    Route::get('/clients', [ClientController::class, 'getClients']);
    Route::get('/clients/{id}', [ClientController::class, 'getClientById']);
    Route::put('/clients/{id}', [ClientController::class, 'updateClient']);
    Route::delete('/clients/{id}', [ClientController::class, 'deleteClient']);

    Route::get('/interests', [InterestController::class, 'index']);
    Route::get('/interests/{id}', [InterestController::class, 'show']);
    Route::post('/interests', [InterestController::class, 'store']);
    Route::put('/interests/{id}', [InterestController::class, 'update']);
    Route::delete('/interests/{id}', [InterestController::class, 'destroy']);
});
