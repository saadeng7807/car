<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function Index()
    {
        $carCategories = [
        [
            'name' => 'سيدان (Sedan)',
            'description' => 'سيارات عائلية مريحة ومناسبة للمدينة.',
            'icon' => 'bi-car-front'
        ],
        [
            'name' => 'دفع رباعي (SUV)',
            'description' => 'سيارات قوية مخصصة للطرق الوعرة والمساحات الواسعة.',
            'icon' => 'bi-truck'
        ],
        [
            'name' => 'رياضية (Sports)',
            'description' => 'سيارات ذات أداء عالٍ وتصميم انسيابي جذاب.',
            'icon' => 'bi-speedometer'
        ]
    ];
        return view('landpage',compact('carCategories'));
    }




public function List_Car()
{
      $cars = [
        [
            'brand' => 'تويوتا',
            'model' => 'كامري 2024',
            'type'  => 'sydan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => '120,000 ريال'
        ],
           [
            'brand' => 'هيونداي',
            'model' => ' 2024 النترا',
            'type'  => 'sydan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => '120,000 ريال'
        ],
        [
            'brand' => 'هيونداي',
            'model' => 'توسان 2024',
            'type'  => 'SUV',
            'image' => 'https://images.unsplash.com/photo-1700148157520-221689252989?q=80&w=400',
            'price' => '115,000 ريال'
        ],

        [
            'brand' => 'كيا',
            'model' => 'سبورتاج 2024',
            'type'  => 'SUV',
            'image' => 'https://images.unsplash.com/photo-1700148157520-221689252989?q=80&w=400',
            'price' => '115,000 ريال'
        ],
        [
            'brand' => 'مرسيدس',
            'model' => 'S-Class',
            'type'  => 'sport',
            'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=400',
            'price' => '550,000 ريال'
        ]
];

      return view('car',compact('cars'));
}
}
