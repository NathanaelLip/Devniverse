<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserIndexController;
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

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/users', [UserIndexController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::get('/search', [UserIndexController::class, 'search']);