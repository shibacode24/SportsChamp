<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Principal;
use App\Models\masters\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrincipalController extends Controller
{
    public function index()
    {
        
        $school = School::select('id','school_name')->get();
        $principal = Principal::all();
        return view('masters.principal',compact('principal','school'));
    }

    public function principal_store(Request $request){
        $request ->validate([
            'school_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'contact_no'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]);
    
        Principal::create([
            'school_id'=>$request->school_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Principal Added Successfully');
    }

    public function principal_edit(Request $request)
        {
            $principal_edit = Principal::find($request->id); 
            $school = School::select('id','school_name')->get();
        return view('masters.principal_edit',compact('principal_edit','school'));

        }

    public function update_principal(Request $request)
    {
        $principal_edit = Principal::find($request->id); 
        Principal::where('id',$request->id)->update([
            'school_id'=>$request->school_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'username'=>$request->username,
        'password'=> $request->password? Hash::make($request->password) : $principal_edit->password,

    ]);

    return redirect(route('principal'))->with('success', 'Principal Updated Successfully');
    }

    public function principal_destroy($id){
        $principal = Principal::find($id)->delete();

        return redirect(route('principal'))->with('success', 'Principal Deleted Successfully');
    }
}
