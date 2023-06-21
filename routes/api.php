<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BreweriesController;
use App\Http\Controllers\ItemConditionsController;

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

Route::resources([
    'items' => ItemsController::class,
    'breweries' => BreweriesController::class,
]);

// Item Conditions
Route::get('items/conditions/index', [ItemConditionsController::class, 'index']);
Route::post('items/conditions/result', [ItemConditionsController::class, 'result']);
