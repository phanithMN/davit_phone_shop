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

Route::get('/product-type-data', [App\Http\Controllers\Api\ProductController::class, 'getProductTypeData']);
Route::get('/order-item-data', [App\Http\Controllers\Api\OrderItemController::class, 'getOrderItemData']);
