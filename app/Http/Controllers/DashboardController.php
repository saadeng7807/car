<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;   
use App\Models\Car;

class DashboardController extends Controller
{
    public function get_brand()
    {
          return view('dashboard.brand');
    }


    public function get_cars()
    {
        
          return view('dashboard.cars');
    }



    public function Save_Brand(Request $request)
    {

     $rule=[
        'name' => 'required',
        'type' => 'required',
        'description' => 'required',
       ];


       $message=[
            'name.required'=>'يرجى ادخال اسم العلامة التجارية',
            'type.required'=>'يرجى ادخال نوع العلامة التجارية',
            'description.required'=>'يرجى ادخال وصف العلامة التجارية'


       ];


        $request->validate($rule,$message);


       Brand::create([   // اضافة سجل الجدول
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
       ]);

         return back();


    }


    public function Save_Car(Request $request)
    {
        $rule=[
            'model_name' => 'required',
            'year' => 'required',
            'color' => 'required',
            'price' => 'required',
            'mileage' => 'required',
        ];

        $message=[
            'model_name.required'=>'يرجى ادخال اسم الموديل',
            'year.required'=>'يرجى ادخال سنة الصنع',
            'color.required'=>'يرجى ادخال لون السيارة',
            'price.required'=>'يرجى ادخال سعر السيارة',
            'mileage.required'=>'يرجى ادخال عدد الكيلومترات المقطوعة',
        ];

        $request->validate($rule, $message);

        // Save the car data to the database
            Car::create([
                  'model_name' => $request->model_name,
                  'year' => $request->year,
                  'color' => $request->color,
                  'price' => $request->price,
                  'mileage' => $request->mileage,
            ]);

            return back();
    }



}
