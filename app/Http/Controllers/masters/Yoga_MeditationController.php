<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Yoga_Meditation;
use Illuminate\Http\Request;

class Yoga_MeditationController extends Controller
{
    public function index()
    {
        $yoga = Yoga_Meditation::all();
      
        return view('masters.yoga_meditation',compact('yoga'));
    }

    public function yoga_meditation_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'date'=>'required',
            'title'=>'required',
            'video_image'=>'required',
            'video_link'=>'required',
            
        ]);
      
        $filename="";
        if ($request->hasFile('video_image')) {
            $file = $request->file('video_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/yoga_meditation_image'), $filename);
    
        } 
 
      $yoga_meditation = new Yoga_Meditation();
      $yoga_meditation->date= $request->date;
      $yoga_meditation->title= $request->title;
      $yoga_meditation->video_link= $request->video_link;
      $yoga_meditation->video_image=$filename;
    
    $yoga_meditation->save(); 

        return redirect()->back()->with('success', 'Added Successfully');
    }

    public function yoga_meditation_edit(Request $request)
        {
            $yoga_edit = Yoga_Meditation::find($request->id); 
           
        return view('masters.yoga_meditation_edit',compact('yoga_edit'));

        }

    public function update_yoga_meditation(Request $request)
    {

        $yoga_meditation =  Yoga_Meditation::where('id',$request->id)->first();
        
        if ($request->hasFile('video_image')) {
            $file = $request->file('video_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/yoga_meditation_image'), $filename);
            $yoga_meditation->video_image=$filename;
    
        } 

           $yoga_meditation->date= $request->date;
           $yoga_meditation->title= $request->title;
           $yoga_meditation->video_link= $request->video_link;
           $yoga_meditation->save();

      
      
    return redirect(route('yoga_meditation'))->with('success', 'Updated Successfully');
    }

    public function yoga_meditation_destroy($id){
        Yoga_Meditation::find($id)->delete();

        return redirect(route('yoga_meditation'))->with('success', 'Deleted Successfully');
    }
}
