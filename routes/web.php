<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SpecialistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', fn () => view('welcome'));

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Registro
Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Administrador
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('users', UserController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('inventory', InventoryController::class);

    Route::resource('specialists', SpecialistController::class);
});

// Citas
Route::middleware(['auth'])->group(function () {

    Route::resource('appointments', AppointmentController::class);

    Route::get('/appointments/calendar', [AppointmentController::class, 'calendar'])
        ->name('appointments.calendar');
});

// Carrito
Route::middleware(['auth'])->group(function () {

    Route::get('/carrito', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/carrito/anadir/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::delete('/carrito/eliminar/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/carrito/anadir-servicio/{id}', [CartController::class, 'addService'])
        ->name('cart.addService');
});

// Reportes
Route::get('/reportes/citas',
[DashboardController::class, 'reportes'])
->middleware(['auth','role:admin'])
->name('reportes.citas');

Route::get('/reportes/servicios',
    [DashboardController::class, 'serviciosMasSolicitados'])
    ->middleware(['auth','role:admin'])
    ->name('reportes.servicios');
    Route::get('/reportes/especialistas',
    [DashboardController::class, 'especialistasMasSolicitadas'])
    ->middleware(['auth','role:admin'])
    ->name('reportes.especialistas');
    Route::get('/reportes/inventario-bajo',
    [DashboardController::class, 'inventarioBajo'])
    ->middleware(['auth','role:admin'])
    ->name('reportes.inventario');
    Route::get('/reportes/ingresos',
    [DashboardController::class, 'ingresosEstimados'])
    ->middleware(['auth','role:admin'])
    ->name('reportes.ingresos');

// Autenticación
require __DIR__.'/auth.php';