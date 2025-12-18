<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\OrganizationController;

Route::prefix('v1/service')->group(function () {
    Route::apiResource('vessels', VesselController::class);
    Route::apiResource('organizations', OrganizationController::class);
});