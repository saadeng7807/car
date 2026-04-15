<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;



Route::get('/',[CarController::class,'Index']);



Route::get('/listcar/{type}',[CarController::class,'List_Car'])->name('listcar');


Route::get('/dashboard',function(){
    return view('dashboard.index');
})->name('dashboard');


route::get('/dashboard/brand',[DashboardController::class,'get_brand'])->name('dashboard.brand');

route::get('/dashboard/cars',[DashboardController::class,'get_cars'])->name('dashboard.cars');
