<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 🔥 CAMBIO: Redirigir la raíz al Login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestión de Citas (Rutas específicas arriba del resource)
    Route::get('/appointments/calendar', [AppointmentController::class, 'calendar'])->name('appointments.calendar');
    Route::patch('/appointments/{id}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::post('/appointments/check', [AppointmentController::class, 'checkAvailability'])->name('appointments.check');
    Route::post('/appointments/check-availability', [AppointmentController::class, 'checkAvailability'])->name('appointments.check');
    Route::patch('/appointments/{id}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');

    Route::resource('appointments', AppointmentController::class)->except(['show']);

    // Servicios y Gastos
    Route::resource('services', ServiceController::class);
    // Dentro del grupo middleware(['auth'])
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    // Si quieres permitir borrar gastos:
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Perfil de Usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';