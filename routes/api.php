<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('items/create', [App\Http\Controllers\ItemsController::class, 'create']);
Route::post('items', [App\Http\Controllers\ItemsController::class, 'store']);

Route::get('items/conditions', [App\Http\Controllers\ItemsController::class, 'conditions']);
Route::post('items/search', [App\Http\Controllers\ItemsController::class, 'search']);

Route::get('breweries', [App\Http\Controllers\BreweriesController::class, 'index']);
Route::get('breweries/create', [App\Http\Controllers\BreweriesController::class, 'create']);
Route::get('breweries/{id}', [App\Http\Controllers\BreweriesController::class, 'show']);
Route::post('breweries', [App\Http\Controllers\BreweriesController::class, 'store']);