<?php

use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\LawyerController;
use App\Http\Controllers\Api\LegalCaseController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SpecializationController;
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

Route::apiResource('/lawyers', LawyerController::class);
Route::apiResource('/specializations', SpecializationController::class);

Route::middleware('auth:api')->group(function(){
    Route::apiResource('/cases', LegalCaseController::class);
    Route::apiResource('/clients', ClientController::class);
    Route::apiResource('/permissions', PermissionController::class);
    Route::apiResource('/positions', PositionController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/specs', SpecializationController::class);
});

