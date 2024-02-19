<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Notification::all();
      
        return view('notification',compact('notification'));
    }

    public function notification_store(Request $request){
        //  dd($request->all());
        $request ->validate([
            'title'=>'required',
            'notification'=>'required',
            'select_user'=>'required',
            
        ]);
      
      $notification = new Notification();
      $notification->title = $request->title;
      $notification->notification= $request->notification;
      $notification->select_user= $request->select_user;

    //   echo json_encode($notification);
    //   exit();

      $notification->save(); 

        return redirect()->back()->with('success', 'Notification Added Successfully');
    }

    public function notification_edit(Request $request)
        {
            $notification_edit = Notification::find($request->id); 
           
        return view('edit_notification',compact('notification_edit'));

        }

    public function update_notification(Request $request)
    {

        $notification =  Notification::where('id',$request->id)->first();
        
        $notification->title = $request->title;
      $notification->notification= $request->notification;
      $notification->select_user= $request->select_user;
       
        $notification->save(); 

      
      
    return redirect(route('notification'))->with('success', 'Notification Updated Successfully');
    }

    public function notification_destroy($id){
        Notification::find($id)->delete();

        return redirect(route('notification'))->with('success', 'Notification Deleted Successfully');
    }
}
