<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Routes accessible only by Admins
    Route::middleware('role:Admin')->group(function () {
        Route::apiResource('suppliers', SupplierController::class);
        Route::apiResource('warehouses', WarehouseController::class);
        // Route::post('/warehouses/transfer', [WarehouseController::class, 'transferStock']); // POST route for transferring stock
    });

    // Routes accessible by Admins and Inventory Managers
    Route::middleware('role:Admin,role:Inventory Manager')->group(function () {
        Route::apiResource('products', ProductController::class);
    });

    // Get authenticated user information
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
