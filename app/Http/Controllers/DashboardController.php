<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;   
use App\Models\Car;

class DashboardController extends Controller
{
    public function get_brand()
    {
           $brands = Brand::all();//  استرجاع جميع الفئات من قاعدة البيانات     
           return view('dashboard.brand',compact('brands'));
        
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
        'icons' => 'nullable',
       ];


       $message=[
            'name.required'=>'يرجى ادخال اسم العلامة التجارية',
            'type.required'=>'يرجى ادخال نوع العلامة التجارية',
            'description.required'=>'يرجى ادخال وصف العلامة التجارية',
            'icons.nullable'=>'يرجى ادخال ايقونة العلامة التجارية',


       ];


        $request->validate($rule,$message);


       Brand::create([   // اضافة سجل الجدول
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'icons' => $request->icons,
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

        // step 1: 
        $image_Name=null;

        if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $image_Name=time().'_'. uniqid().'_'.$image->getClientOriginalName();

                $image->move(public_path('images'),$image_Name);

               
            }

        $request->validate($rule, $message);

        // Save the car data to the database
            Car::create([
                  'model_name' => $request->model_name,
                  'year' => $request->year,
                  'color' => $request->color,
                  'price' => $request->price,
                  'mileage' => $request->mileage,
                  'image' => $image_Name,
            ]);

            return back();
    }



}
