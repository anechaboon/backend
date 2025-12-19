<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\ServiceLineController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('vessels', VesselController::class);
    Route::apiResource('organizations', OrganizationController::class);
    Route::apiResource('service-lines', ServiceLineController::class);
});