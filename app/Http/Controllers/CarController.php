<?php

namespace App\Http\Controllers;

//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Termwind\parse;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\support\Facades\Cookie;

class CarController extends Controller
{
    public function Index()
    {

        
      //  $y=Auth::user()->name;
        //   dd($y);

         Cookie::queue('user_name', 'saad', 60); // Set a cookie named 'user_name' with the value 'saad' that expires in 60 minutes
         Cookie::queue('Laravel', 'saad', 60);
         
         session(["x"=>"Welcome To Our Website"]);  // set || store 
         
         session(["saad"=>"hello"]);  // set || store

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
