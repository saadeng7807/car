<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;



Route::get('/',[CarController::class,'Index']);
Route::get('/listcar',[CarController::class,'List_Car'])->name('listcar');
