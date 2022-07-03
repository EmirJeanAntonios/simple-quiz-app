<?php

use App\Http\Controllers\SurveyController;
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
    Route::resource("survey",SurveyController::class);

    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});


require __DIR__ . '/auth.php';
