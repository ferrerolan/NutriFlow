<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paciente\{
    AuthController as PacienteAuthController,
    DashboardController as PacienteDashboardController,
    PlanoAlimentarController,
    TreinoController
};

Route::prefix('paciente')->name('paciente.')->group(function () {
    // Rotas públicas
    Route::get('login', [PacienteAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [PacienteAuthController::class, 'login'])->name('login.submit');

    Route::prefix('paciente')->group(function () {
        Route::get('login', [PacienteAuthController::class, 'showLogin'])->name('paciente.login');
        Route::post('login', [PacienteAuthController::class, 'login']);
        Route::middleware('auth')->group(function () {
            Route::get('dashboard', [PacienteDashboardController::class, 'index'])->name('paciente.dashboard');
            Route::get('plano-alimentar/{id}', [PlanoAlimentarController::class, 'show']);
            Route::get('treino/{id}', [TreinoController::class, 'show']);
        });
    });


    // Rotas protegidas (somente paciente logado)
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [PacienteDashboardController::class, 'index'])->name('dashboard');
        Route::get('plano-alimentar/{id}', [PlanoAlimentarController::class, 'show'])->name('plano');
        Route::get('treino/{id}', [TreinoController::class, 'show'])->name('treino');
    });
});
