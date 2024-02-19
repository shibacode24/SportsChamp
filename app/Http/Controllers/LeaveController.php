<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function leave()
    {
        $leave = Leave:: get();
        return view('leave',compact('leave'));
    }

    public function update_leave_status(Request $request)
    {
      $user = Leave::where('id',$request->user_id)->first();
      $user->status=$request->status ;
      $user->admin_remark=$request->admin_remark;
      // dump($user);
      // exit();
      $user->save();
      return redirect()->back();

    }

}
