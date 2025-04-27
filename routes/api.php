<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BonPlanController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// bon plans
Route::get('/bon-plans', [BonPlanController::class, 'getAllBonPlans']);
Route::get('/bon-plans/filter',[BonPlanController::class, 'filter']);
Route::get('/bon-plans/favorites/{userId}',[BonPlanController::class, 'getFavoriteBonplans']);
Route::get('/bon-plans/favorites/{userId}/{bonPlanId}',[BonPlanController::class, 'isFavorited']);
Route::get('/bon-plans/favorites/{userId}/{bonPlanId}/toggle',[BonPlanController::class, 'toggleFavorite']);
Route::get('/bon-plans/{bonPlan}', [BonPlanController::class, 'getOneBonPlans']);

// users
Route::get('/users', [UserController::class, 'getAllUsers']);
