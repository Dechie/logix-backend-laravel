<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\StaffController;
use App\Http\Controllers\Auth\DriverController;
use App\Http\Controllers\Dashboards\AdminDashboardController;
use App\Http\Controllers\Dashboards\StaffDashboardController;
use App\Http\Controllers\Dashboards\DriverDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/create', [AdminDashboardController::class, 'store']);

Route::get('/home', [AdminDashboardController::class, 'getCompanies']);
Route::get('/{company}', [AdminDashboardController::class, 'index']);



Route::prefix('admin')
    ->group(function () {

        Route::post('/register', [AdminDashboardController::class, 'register']);
        Route::middleware('auth:sanctum')->group(function () {
        });
    });

Route::prefix('staff')->group(function(){
    Route::middleware('auth:sanctum')->group(function(){

        Route::post('/applyStaff', [StaffDashboardController::class, 'applyToCompany']);

        Route::get('/login', [StaffController::class,'login'])->name('login');

    });
    Route::post('/register', [StaffController::class, 'register']);
});

Route::prefix('driver')
    ->group(function(){

    Route::post('/register', [DriverController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function(){

        Route::get('/login', [DriverController::class,'login'])->name('login');
    });
});
