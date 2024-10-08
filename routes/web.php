<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlamadaController;
use App\Http\Controllers\PaginasController;

// rutas para el cliente
Route::get('/cliente', [PaginasController::class, 'listarClientes'])->name('cliente.ver');
Route::get('/agregarnuevo', [PaginasController::class, 'registrarClientes'])->name('cliente.agregar');
Route::post('/gcliente', [PaginasController::class, 'guardarCliente'])->name('cliente.guardar');
Route::get('/cliente/{id}/edit', [PaginasController::class, 'edit'])->name('contacto.edit');
Route::post('/cliente/{id}/update', [PaginasController::class, 'update'])->name('contacto.update');
Route::delete('/cliente/{id}', [PaginasController::class, 'eliminarCliente'])->name('contacto.eliminar');

// controlador para la llamada
Route::get('/', [LlamadaController::class, 'paginaInicio'])->name('inicio');
Route::get('/formulario', [LlamadaController::class, 'mostrarFormulario'])->name('llamadas.create');
Route::post('/registro', [LlamadaController::class, 'registrarLlamada'])->name('llamadas.store');
Route::get('/llamadas', [LlamadaController::class, 'listarLlamadas'])->name('llamadas.index');
Route::delete('/llamadas/{id}', [LlamadaController::class, 'eliminarLlamada'])->name('llamadas.destroy');
Route::get('/llamadas/{id}/edit', [LlamadaController::class, 'edit'])->name('llamadas.edit');
Route::post('/llamadas/{id}/update', [LlamadaController::class, 'update'])->name('llamadas.update');
Route::get('/acerca', [LlamadaController::class, 'acercaDe'])->name('about');


