<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\NotaCreditoController;
use App\Http\Controllers\NotaDebitoController;
use App\Http\Controllers\ResumenDocumentoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/factura/create', [FacturaController::class, 'create'])->name('factura.create');
Route::post('/factura/store', [FacturaController::class, 'store'])->name('factura.store');

Route::get('/boleta/create', [BoletaController::class, 'create'])->name('boleta.create');
Route::post('/boleta/store', [BoletaController::class, 'store'])->name('boleta.store');

Route::get('/notacredito/create', [NotaCreditoController::class, 'create'])->name('notacredito.create');
Route::post('/notacredito/store', [NotaCreditoController::class, 'store'])->name('notacredito.store');

Route::get('/notadebito/create', [NotaDebitoController::class, 'create'])->name('notadebito.create');
Route::post('/notadebito/store', [NotaDebitoController::class, 'store'])->name('notadebito.store');

Route::get('/envioresumen/create', [ResumenDocumentoController::class, 'resumencreate'])->name('envioresumen.create');
Route::post('/envioresumen/store', [ResumenDocumentoController::class, 'resumenstore'])->name('envioresumen.store');
Route::get('/enviobaja/create', [ResumenDocumentoController::class, 'bajacreate'])->name('enviobaja.create');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
