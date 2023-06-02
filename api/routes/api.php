<?php

use App\Http\Controllers\PhraseController;
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

Route::get('/list', [PhraseController::class, 'listing']);
Route::post('/create', [PhraseController::class, 'create']);
Route::get('/edit/{phrase}', [PhraseController::class, 'edit']);
Route::put('/update/{phrase}', [PhraseController::class, 'update']);
Route::delete('/delete/{phrase}', [PhraseController::class, 'delete']);