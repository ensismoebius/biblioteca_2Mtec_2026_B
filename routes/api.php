<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AutorController;
// use App\Http\Controllers\Api\ClienteController;
// use App\Http\Controllers\Api\GeneroController;
// use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/autores', [AutorController::class, 'index']);
    Route::get('/autores/{id}', [AutorController::class, 'show']);

    // Comentados temporariamente para o PR #2 não estourar linhas ou dar erro de classe ausente
    // Route::get('/clientes', [ClienteController::class, 'index']);
    // Route::get('/clientes/{id}', [ClienteController::class, 'show']);

    // Route::get('/generos', [GeneroController::class, 'index']);
    // Route::get('/generos/{id}', [GeneroController::class, 'show']);

    // Route::get('/users', [UserController::class, 'index']);
});
