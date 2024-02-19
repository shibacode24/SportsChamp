<?php

namespace App\Http\Controllers\masters;
use App\Models\masters\City;
use App\Models\masters\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $city = City::all();
        $school = School::all();
        return view('masters.school',compact('city','school'));
    }

    public function school_store(Request $request){
        $request ->validate([
            'city_id'=>'required',
            'date'=>'required',
            'school_code'=>'required',
            'school_name'=>'required',
            'address'=>'required',
            'contact_person_name'=>'required',
            'contact_no'=>'required',
            'email'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);
    
        School::create([
            'city_id'=>$request->city_id,
            'date'=>$request->date,
            'school_code'=>$request->school_code,
            'school_name'=>$request->school_name,
            'address'=>$request->address,
            'contact_person_name'=>$request->contact_person_name,
            'contact_no'=>$request->contact_no,
            'email'=>$request->email,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);

        return redirect()->back()->with('success', 'School Added Successfully');
    }

    public function school_edit(Request $request)
        {
            $school_edit = School::find($request->id); 
            $city = City::all();
        return view('masters.school_edit',compact('school_edit','city'));

        }

    public function update_school(Request $request)
    {
    School::where('id',$request->id)->update([
        'city_id'=>$request->city_id,
        'date'=>$request->date,
        'school_code'=>$request->school_code,
        'school_name'=>$request->school_name,
        'address'=>$request->address,
        'contact_person_name'=>$request->contact_person_name,
        'contact_no'=>$request->contact_no,
        'email'=>$request->email,
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
    ]);

    return redirect(route('school'))->with('success', 'School Updated Successfully');
    }

    public function school_destroy($id){
        $school = School::find($id)->delete();

        return redirect(route('school'))->with('success', 'School Deleted Successfully');
    }

}
