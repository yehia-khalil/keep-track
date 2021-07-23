<?php

use App\Http\Controllers\ExerciseController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('exercises',ExerciseController::class);
Route::apiResource('workouts',WorkoutController::class);
Route::apiResource('milestones',MilestoneController::class);