<?php

use App\Http\Controllers\Cadastro\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'find');
    Route::post('/users', 'create');
    Route::get('/users/{user}', 'read');
    Route::patch('/users/{user}', 'update');
    Route::delete('/users/{user}', 'delete');
});

Route::controller(ProdutoController::class)->group(function () {
    Route::get('/produtos', 'find');
    Route::post('/produtos', 'create');
    Route::get('/produtos/{produto}', 'read');
    Route::delete('/produtos/{produto}', 'destroy');
});
