<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

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



Route::group(["middleware" => "auth"], function () {

    /* Resources */
    Route::resource("survey", SurveyController::class);

    Route::resource("question",QuestionController::class)->only([
        'edit','update'
    ]);
    Route::get("{surveyuuid}/question", [QuestionController::class, "index"])->name("question.index");
    Route::get("{surveyuuid}/question/create", [QuestionController::class, "create"])->name("question.create");    
    // Route::get("question/{questionuuid}/edit", [QuestionController::class, "edit"])->name("question.edit");
    Route::post("{surveyuuid}/question/store", [QuestionController::class, "store"])->name("question.store");
    // Route::post("question/{question}/update", [QuestionController::class, "update"])->name("question.update");


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


require __DIR__ . '/auth.php';
