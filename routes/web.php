<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodolistController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
require __DIR__.'/auth.php';


Route::get('/', [TodolistController::class, 'index'])->name('todolist.index');
Route::get('/todolist/create', [TodolistController::class, 'create'])->name('todolist.create');
Route::get('/todolist/{todolist}', [TodolistController::class, 'show'])->name('todolist.show');
Route::post('/todolist', [TodolistController::class, 'store'])->name('todolist.store');
Route::get('/todolist/{todolist}/edit', [TodolistController::class, 'edit'])->name('todolist.edit');
Route::put('/todolist/{todolist}', [TodolistController::class, 'update'])->name('todolist.update');
Route::delete('/todolist/{todolist}', [TodolistController::class, 'destroy'])->name('todolist.destroy');

