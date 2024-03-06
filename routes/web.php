<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login-store')->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/store-task', [TaskController::class, 'storeTask'])->name('store-task');
    Route::get('/task/edit/{id}', [TaskController::class, 'editTask'])->name('edit-task');
    Route::put('/task/update/{id}', [TaskController::class, 'updateTask'])->name('update-task');
    Route::delete('/task/delete/{id}', [TaskController::class, 'deleteTask'])->name('delete-task');
});

Route::get('/', HomeController::class)->name('home');
