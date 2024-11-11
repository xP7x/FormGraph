<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FormController;

Route::get('/forms', [FormController::class, 'index']);
Route::post('/forms', [FormController::class, 'store']);
Route::get('/charts',[FormController::class,'showCharts']);