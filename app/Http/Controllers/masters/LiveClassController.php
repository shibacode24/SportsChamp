<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\LiveClass;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
     public function index()
    {
        $live_class = LiveClass::all();
      
        return view('masters.live_class',compact('live_class'));
    }

    public function live_class_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'title'=>'required',
            'link'=>'required',    
        ]);
    
      $live_class = new LiveClass();
      $live_class->title= $request->title;
      $live_class->link= $request->link;

    
    $live_class->save(); 

        return redirect()->back()->with('success', 'Live Class Added Successfully');
    }

    public function live_class_edit(Request $request)
        {
            $live_class_edit = LiveClass::find($request->id); 
           
        return view('masters.edit_live_class',compact('live_class_edit'));

        }

    public function update_live_class(Request $request)
    {
// dd($request->all());
        $live_class =  LiveClass::where('id',$request->id)->first();
    
           $live_class->title= $request->title;
           $live_class->link= $request->link;
           $live_class->save();

      
      
    return redirect(route('live_class'))->with('success', 'Live Class Updated Successfully');
    }

    public function live_class_destroy($id){
        LiveClass::find($id)->delete();

        return redirect(route('live_class'))->with('success', 'Live Class Deleted Successfully');
    }
}
