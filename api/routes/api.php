<?php

use App\Http\Controllers\ListController;
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

Route::get('/list', [ListController::class, 'listing']);
Route::post('/create', [ListController::class, 'create']);
Route::get('/edit/{phrase}', [ListController::class, 'edit']);
Route::put('/update/{phrase}', [ListController::class, 'update']);
Route::delete('/delete/{phrase}', [ListController::class, 'delete']);