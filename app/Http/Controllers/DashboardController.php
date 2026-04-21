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
         $cars = Car::all();

          return view('dashboard.cars',compact('cars'));
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
                  'type' => $request->type,
            ]);

            return back();
    }

    public function Delete_brand($id)
    {
        $brand = Brand::find($id);  // البحث عن الفئة بالمعرف
        $brand->delete();
        return back();
        
    }

      public function Delete_Car($id)
      {
        $car = Car::find($id);  // البحث عن السيارة بالمعرف
        $car->delete();
        return back();
      }


      public function Edit_Brand($id)
      {
        $brand = Brand::find($id); // serch for the brand by id
        return view('dashboard.edit_brands', compact('brand'));
      }



      public function Edit_Cars($id)
      {
        $car=Car::find($id);
        return view('dashboard.edit_cars',compact('car'));
      }


      public function Update_Car(Request $request, $id)
      {

     
        $image_Name=null;

        if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $image_Name=time().'_'. uniqid().'_'.$image->getClientOriginalName();
                 
                $image->move(public_path('images'),$image_Name);

               
            }


        $car = Car::find($id);
        $car->update([
            'model_name' => $request->model_name,
            'year' => $request->year,
            'color' => $request->color,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'image' => $image_Name,
            'type' => $request->type,
        ]);
        return redirect()->route('dashboard.cars');
      }

      public function Update_brands(Request $request, $id)
      {
        $brand = Brand::find($id);
        $brand->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'icons' => $request->icons,
        ]);
        return redirect()->route('dashboard.brand');
      }
}
