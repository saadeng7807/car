<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\parse;
use App\Models\Brand;
use App\Models\Car;
class CarController extends Controller
{
    public function Index()
    {
        $carCategories = Brand::all();//  استرجاع جميع الفئات من قاعدة البيانات
        return view('landpage',compact('carCategories'));
    }


public function Update(Request $request)
{
    
}

public function List_Car($type)
{
      $cars =Car::all();
      $s=collect($cars)->where('type',$type)->all();
      return view('car',compact('s'));
}
}
