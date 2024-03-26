<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $event = Events::all();
      
        return view('masters.event',compact('event'));
    }

    public function event_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'date'=>'required',
            'event_name'=>'required',    
            'event_details'=>'required',    
        ]);
    
      $event = new Events();
      $event->date= $request->date;
      $event->event_name= $request->event_name;
      $event->event_details= $request->event_details;

      $event->save(); 

        return redirect()->back()->with('success', 'Events Added Successfully');
    }

    public function event_edit(Request $request)
        {
            $event_edit = Events::find($request->id); 
           
        return view('masters.edit_event',compact('event_edit'));

        }

    public function update_event(Request $request)
    {
// dd($request->all());
        $event =  Events::where('id',$request->id)->first();
    
        $event->date= $request->date;
        $event->event_name= $request->event_name;
        $event->event_details= $request->event_details;
        $event->save();

    return redirect(route('event'))->with('success', 'Events Updated Successfully');
    }

    public function event_destroy($id){
        Events::find($id)->delete();

        return redirect(route('event'))->with('success', 'Events Deleted Successfully');
    }
}
