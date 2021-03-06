<?php

use App\Http\Controllers\ApiController;
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

Route::get("surveys",[ApiController::class,"surveys"]);
Route::get("survey/{uuid}",[ApiController::class,"survey"]);
Route::post("survey/{uuid}/check-answers",[ApiController::class,"checkAnswers"])->middleware("cors")->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;

