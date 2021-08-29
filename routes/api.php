<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'register']);
Route::middleware('auth:sanctum')->get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->apiResource('exercises', ExerciseController::class);
Route::middleware('auth:sanctum')->apiResource('workouts', WorkoutController::class);
Route::middleware('auth:sanctum')->apiResource('milestones', MilestoneController::class);
