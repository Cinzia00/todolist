<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Todolist;
use App\Http\Controllers\Api\TodolistController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todolist/{id}', [TodolistController::class,'show']);
Route::get('/todolist', [TodolistController::class,'index']);
Route::post('/newtask', [TodolistController::class,'store']);
Route::post('/editask/{id}', [TodolistController::class,'update']);
Route::post('/setdone/{id}', [TodolistController::class,'setDone']);
Route::delete('/todolist/{id}', [TodolistController::class,'destroy']);

