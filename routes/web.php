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

Route::post('/save_brand',[DashboardController::class,'Save_Brand'])->name('save_brand');

Route::post('/save_car',[DashboardController::class,'Save_Car'])->name('save_car');

Route::get('/delete_brand/{id}',[DashboardController::class,'Delete_brand'])->name('delete_brand');
Route::get('/delete_car/{id}',[DashboardController::class,'Delete_Car'])->name('delete_car');

Route::get('/edit_brand/{id}',[DashboardController::class,'Edit_Brand'])->name('edit_brand');

Route::post('/update_brand/{id}',[DashboardController::class,'Update_brands'])->name('update_brand');

Route::get('/edit_car/{id}',[DashboardController::class,'Edit_Cars'])->name('edit_car');

Route::post('/update_car/{id}',[DashboardController::class,'Update_Car'])->name('update_car');