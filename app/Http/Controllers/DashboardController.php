<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
