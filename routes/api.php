<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\GroupCityController;
use App\Http\Controllers\CampaignGroupController;

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

Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('cities', CityController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('groups-cities', GroupCityController::class);
    Route::resource('campaigns', CampaignController::class);
    Route::resource('campaigns-groups', CampaignGroupController::class);
});
