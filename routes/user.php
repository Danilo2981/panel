<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/nuevo', [UserController::class, 'create'])->name('users.create');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');