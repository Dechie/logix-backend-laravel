<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tenant\RouteController;
use App\Http\Controllers\Tenant\ProjectController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\StaffController;
use App\Http\Controllers\Auth\DriverController;
use App\Http\Controllers\Dashboards\AdminDashboardController;
use App\Http\Controllers\Dashboards\StaffDashboardController;
use App\Http\Controllers\Dashboards\DriverDashboardController;
use App\Http\Controllers\WarehouseController;


Route::get('/{company}/projects', [ProjectController::class, 'index']);
Route::get('/{company}/routes', [RouteController::class, 'index']);
Route::post('/{company}/routes', [RouteController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/{company}/warehouses', [WarehouseController::class, 'index']);
    Route::post('/{company}/warehouses', [WarehouseController::class, 'store']);
    Route::post('/{company}/staffToWarehouse', [WarehouseController::class, 'staffToWarehouse']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/{company}/staffs', [StaffController::class, 'index']);
    //Route::get('/{company}/drivers', [StaffController::class, 'index']);
});
