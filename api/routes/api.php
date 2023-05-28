<?php

use App\Http\Controllers\listController;
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

Route::get('/list', [listController::class, 'listing']);
Route::post('/create', [listController::class, 'create']);
Route::get('/edit/{phrase}', [listController::class, 'edit']);
Route::put('/update/{phrase}', [listController::class, 'update']);
Route::delete('/delete/{phrase}', [listController::class, 'delete']);