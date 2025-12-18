<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);


Route::prefix('v1')->group(function () {
    Route::apiResource('vessels', VesselController::class);
    Route::apiResource('organizations', OrganizationController::class);
});