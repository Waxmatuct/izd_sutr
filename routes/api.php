<?php

use App\Http\Controllers\Api\PlanController;
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

Route::get('/plan-{year}', [PlanController::class, 'year']);

Route::get('/all/plan-{year}', [PlanController::class, 'yearWithTrashed']);

Route::delete('/book/delete/{id}', [PlanController::class, 'deleteBook']);

Route::get('/book/restore/{id}', [PlanController::class, 'restoreBook']);

Route::patch('/book/{id}/patch', [PlanController::class, 'patchStatus']);
