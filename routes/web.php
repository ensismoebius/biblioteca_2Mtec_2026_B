<?php

use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:ver-auditoria'])->group(function () {
    Route::get('/auditoria', [AuditoriaController::class, 'index'])->name('auditoria.index');
});

Route::get('/relatorios/atrasos/pdf', [RelatorioController::class, 'atrasospdf'])->name('relatorios.atrasos.pdf');
Route::get('/relatorios/mais-emprestados/pdf', [RelatorioController::class, 'maisEmprestadosPdf'])->name('relatorios.mais-emprestados.pdf');

require __DIR__.'/auth.php';
