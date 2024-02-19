<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function city_store(Request $request){

        $request ->validate([
            'city'=>'required',
        ]);
        $data =[
            'city'=>$request->input('city'),
        ];

        $city = City::create($data);

        return redirect(route('city_master'))->with('success', 'City Added Successfully');
        // return redirect()->route('city_master')->with('success', 'City Added Successfully');
    }
}
