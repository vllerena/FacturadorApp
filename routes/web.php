<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\NotaCreditoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/factura/create', [FacturaController::class, 'create'])->name('factura.create');
Route::post('/factura/store', [FacturaController::class, 'store'])->name('factura.store');

Route::get('/boleta/create', [BoletaController::class, 'create'])->name('boleta.create');
Route::post('/boleta/store', [BoletaController::class, 'store'])->name('boleta.store');

Route::get('/notacredito/create', [NotaCreditoController::class, 'create'])->name('notacredito.create');
Route::post('/notacredito/store', [NotaCreditoController::class, 'store'])->name('notacredito.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
