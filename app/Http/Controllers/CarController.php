<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\parse;
use App\Models\Brand;
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
      $cars = [
        [
            'brand' => 'تويوتا',
            'model' => 'كامري 2024',
            'type'  => 'sydan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => 120,000
        ],
           [
            'brand' => 'هيونداي',
            'model' => ' 2024 النترا',
            'type'  => 'sydan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => 120,000
        ],
        [
            'brand' => 'هيونداي',
            'model' => 'توسان 2024',
            'type'  => 'SUV',
            'image' => 'https://images.unsplash.com/photo-1700148157520-221689252989?q=80&w=400',
            'price' => 115,000
        ],

        [
            'brand' => 'كيا',
            'model' => 'سبورتاج 2024',
            'type'  => 'SUV',
            'image' => 'https://images.unsplash.com/photo-1700148157520-221689252989?q=80&w=400',
            'price' => 115,000
        ],
        [
            'brand' => 'مرسيدس',
            'model' => 'S-Class',
            'type'  => 'sport',
            'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=400',
            'price' => 550,000
        ]
];
      
  

        $s=collect($cars)->where('type',$type)->all();

   

      return view('car',compact('s'));
}
}
