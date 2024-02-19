<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\masters\Employee;
use App\Models\masters\City;
use App\Models\masters\Designation;
use App\Models\masters\School;
use Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $city = City::all();
        $designation = Designation::all();
        $school = School::select('id','school_name')->get();
        $employee = Employee::all();
        return view('masters.employee',compact('city','employee','designation','school'));
    }

    public function employee_store(Request $request){
        $request ->validate([
            'city_id'=>'required',
            'designation_id'=>'required',
            'date'=>'required',
            'emp_code'=>'required',
            'school_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'contact_no'=>'required',
            'email'=>'required',
            'pincode'=>'required',      
            'username'=>'required',
            'password'=>'required',
        ]);
    
        Employee::create([
            'city_id'=>$request->city_id,
            'designation_id'=>$request->designation_id,
            'date'=>$request->date,
            'emp_code'=>$request->emp_code,
            'school_id'=>$request->school_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'contact_no'=>$request->contact_no,
            'email'=>$request->email,
            'pincode'=>$request->pincode,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Employee Added Successfully');
    }

    public function employee_edit(Request $request)
        {
            $employee_edit = Employee::find($request->id); 
            $city = City::all();
            $designation = Designation::all();
            $school = School::select('id','school_name')->get();
        return view('masters.employee_edit',compact('employee_edit','city','designation','school'));

        }

    public function update_employee(Request $request)
    {
        $employee_edit = Employee::find($request->id); 
        Employee::where('id',$request->id)->update([
        'city_id'=>$request->city_id,
        'designation_id'=>$request->designation_id,
        'date'=>$request->date,
        'emp_code'=>$request->emp_code,
        'school_id'=>$request->school_id,
        'name'=>$request->name,
        'address'=>$request->address,
        'contact_no'=>$request->contact_no,
        'email'=>$request->email,
        'pincode'=>$request->pincode,
        'username'=>$request->username,
        'password'=> $request->password? Hash::make($request->password) : $employee_edit->password,

    ]);

    return redirect(route('employee'))->with('success', 'Employee Updated Successfully');
    }

    public function employee_destroy($id){
        $employee = Employee::find($id)->delete();

        return redirect(route('employee'))->with('success', 'Employee Deleted Successfully');
    }

}
