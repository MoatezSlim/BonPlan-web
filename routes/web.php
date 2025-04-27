<?php

use App\Models\Rating;
use App\Livewire\Pages\Chat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BonPlanController;
use App\Http\Controllers\SousMenuController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        
       

      
        Route::post('bon-plans', [BonPlanController::class, 'store'])->name(
            'bon-plans.store'
        );

        Route::get('bonplans/c', [
            BonPlanController::class,
            'create2',
        ])->name('bon-plans.create2')
        ;

        //userrrrrr
        Route::get('bonplans/sh/{user}', [
            BonPlanController::class,
            'show2',
        ])->name('bon-plans.create2')
        ;
        
        //Route pour bon plan (user connecté)
        Route::get('bonplans/c/{user}', [
            BonPlanController::class,
            'create3',
        ])->name('bon-plans.create3')
        ;

        Route::get('bon-plans/{bonPlan}/users/{user}/ratings/create', [RatingController::class, 'create2'])->name('ratings.create');
        Route::post('bon-plans/{bon_plan_id}/user/{user_id}/ratings', [RatingController::class, 'store'])->name('ratings.store');
        Route::get('bon-plans/{bon_plan_id}/user/{user_id}/ratings', [RatingController::class, 'show'])->name('ratings.show');
        Route::get('bon-plans/{bonPlan}/ratings/{ratings}/edit', [RatingController::class,'edit',])->name('ratings.edit');
        
        Route::get('bon-plans/{bonPlan}/menus/user/{user}', [MenuController::class, 'show2'])->name('menus.show2');

        //user
        Route::get('bonplans/{bonPlan}/menus', [MenuController::class, 'show2']);


        Route::get('bon-plans/{bonPlan}', [
            BonPlanController::class,
            'show',
        ])->name('bon-plans.show');
        Route::get('bon-plans/{bonPlan}/edit', [
            BonPlanController::class,
            'edit',
        ])->name('bon-plans.edit');
        Route::put('bon-plans/{bonPlan}', [
            BonPlanController::class,
            'update',
        ])->name('bon-plans.update');
        Route::delete('bon-plans/{bonPlan}', [
            BonPlanController::class,
            'destroy',
        ])->name('bon-plans.destroy');

        //chat 

Route::view('test', 'test');

Route::get('chat', Chat::class)
    ->middleware(['auth'])
    ->name('chat');


        //filter
        Route::get('/api/bonplans/filter', [BonPlanController::class, 'filter'])->name('bonplans.filter');

      
    });
