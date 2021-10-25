<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Empresas
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas');
Route::get('/empresas/nuevo', [EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
Route::delete('/empresas/{empresa}', [EmpresaController::class, 'delete'])->name('empresas.delete');
