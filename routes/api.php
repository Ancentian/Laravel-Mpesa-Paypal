<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MPESAC2BController;

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

//MPESA C2B

Route::post('validation', [MPESAC2BController::class, 'validation'])->name('c2b.validate');
Route::post('confirmation', [MPESAC2BController::class, 'confirmation'])->name('c2b.confirm');
