<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\ServiceLineController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TicketController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('v1')->group(function () {
        Route::apiResource('tickets', TicketController::class);
        Route::apiResource('vessels', VesselController::class);
        Route::apiResource('organizations', OrganizationController::class);
        Route::apiResource('service-lines', ServiceLineController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('users', UserController::class);
    });
});