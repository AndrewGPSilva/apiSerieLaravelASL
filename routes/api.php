<?php

use App\Http\Controllers\SerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('series', [SerieController::class, 'index']);
Route::post('series', [SerieController::class, 'store']);
Route::get('series/{id}', [SerieController::class, 'show']);
Route::put('series/{id}', [SerieController::class, 'update']);
Route::delete('series/{id}', [SerieController::class, 'destroy']);
