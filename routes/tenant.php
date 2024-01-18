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

Route::group(['middleware' => ['tenant']], function () {
    Route::get('/{company}/projects', [ProjectController::class, 'index']);
    Route::get('/{company}/routes', [RouteController::class, 'index']);
    Route::post('/{company}/routes', [RouteController::class, 'store']);
});
