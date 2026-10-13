<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/livros', [LivroController::class, 'index']);
Route::get('/livros/{id}', [LivroController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/autores', [AutorController::class, 'index']);
    Route::get('/autores/{id}', [AutorController::class, 'show']);

    Route::get('/generos', [GeneroController::class, 'index']);
    Route::get('/generos/{id}', [GeneroController::class, 'show']);

    Route::get('/users', [UserController::class, 'index']);

});
