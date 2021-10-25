<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->name('home');
});

// Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/nuevo', [UserController::class, 'create'])->name('users.create');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [
    HomeController::class, 'index'
])->middleware(['auth'])->name('admindashboard');

require __DIR__.'/auth.php';
require __DIR__.'/empresa.php';
