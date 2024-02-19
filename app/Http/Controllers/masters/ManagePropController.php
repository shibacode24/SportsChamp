<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Employee;
use App\Models\masters\IssueProp;
use App\Models\masters\IssuePropList;
use App\Models\masters\ManageProp;
use App\Models\masters\Prop;
use App\Models\masters\School;
use App\Models\masters\Vendor;
use App\Models\masters\ManagePropList;
use Illuminate\Http\Request;

class ManagePropController extends Controller
{
   public function index()
   {
    $vendor = Vendor:: select('id','vendor_name')->get();
    $prop = Prop:: select('id','prop_name')->get();
    $emp = Employee:: select('id','emp_code')->get();
    $school = School:: select('id','school_code')->get();
    $manageprop = ManageProp:: all();
    $manageproplist = ManagePropList::get();
    // echo json_encode($manageproplist);
    // exit();
    $issueprop = IssueProp:: join('employee','employee.id','=','issue_prop.emp_code')
    ->join('school','school.id','=','issue_prop.school_code')
    ->select('issue_prop.*','employee.emp_code','school.school_code')
    ->get();

    $issueproplist = IssuePropList:: all();
    return view('masters.prop',compact('vendor','prop','emp','school','manageprop','issueprop','manageproplist','issueproplist'));
   }

   public function manage_prop_store(Request $request){
    //  dd($request->all());
   $request ->validate([
       'date'=>'required',
       'vendor_id'=>'required',
       'prop_id'=>'required',
       'quntity'=>'required',
       
   ]);
 
 $manage_prop = new ManageProp();
 $manage_prop->date = $request->date;
 $manage_prop->vendor_id= $request->vendor_id;
 $manage_prop->save(); 

 foreach($request->prop_id as $key=>$prop_id){
  $manage_prop_list = new ManagePropList();
  $manage_prop_list->manage_prop_id= $manage_prop->id;
  $manage_prop_list->prop_id= $prop_id;
  $manage_prop_list->quntity= $request->quntity[$key];
  $manage_prop_list->save();
 }
 

//  echo json_encode($manage_prop);
//  exit();


   return redirect()->back()->with('success', 'Manage Prop Added Successfully');
}

public function manage_prop_edit(Request $request)
   {
       $manage_prop_edit = ManageProp::find($request->id); 
       $manage_prop_list_edit = ManagePropList::where('manage_prop_id',$manage_prop_edit->id)->get(); 
       $vendor = Vendor:: select('id','vendor_name')->get();
        $prop = Prop:: select('id','prop_name')->get();
        $emp = Employee:: select('id','emp_code')->get();
        $school = School:: select('id','school_code')->get();
        
      
   return view('masters.manage_prop_edit',compact('manage_prop_edit','vendor','prop','emp','school','manage_prop_list_edit'));

   }

// public function update_manage_prop(Request $request)
// {

//   $manage_prop = ManageProp::find($request->id);
//   $manage_prop->date = $request->date;
//   $manage_prop->vendor_id= $request->vendor_id;
//   $manage_prop->save(); 
 
//   for($i=0;$i<count($request->quntity); $i++){
//     if (isset($request->quntity[$i])){
//    $manage_prop_list = new ManagePropList;
//    $manage_prop_list->manage_prop_id= $request->id;
//    $manage_prop_list->prop_id= $request->prop_id[$i];
//    $manage_prop_list->quntity= $request->quntity[$i];
//   //  echo json_encode($manage_prop_list);
//   //  exit();
//    $manage_prop_list->save();
//   }
// }

// return redirect(route('manage_prop'))->with('success', 'Manage Prop Updated Successfully');
// }

public function update_manage_prop(Request $request)
{
   
  $manage_prop = ManageProp::find($request->id);
  $manage_prop->date = $request->date;
  $manage_prop->vendor_id= $request->vendor_id;
  $manage_prop->save(); 

    $insert_id=$manage_prop->id;

    // MobileSeriesId::where('mobile_module_id',$mobile_module->id)->delete();
    for($i=0;$i<count($request->prop_id); $i++){
        if (isset($request->prop_id[$i])){
            if (isset($request->existing_id[$i])){
                $manage_prop_list=ManagePropList::find($request->existing_id[$i]); //if me tb ayega jb uske pass existing ids rahegi  
            }else{                   //  else me - agar existing record present nhi hai to new record create kr ne ke liye use kiya

            $manage_prop_list=new ManagePropList;
            $manage_prop_list->manage_prop_id=$insert_id;
            }
            $manage_prop_list->prop_id= $request->prop_id[$i];
            $manage_prop_list->quntity= $request->quntity[$i];

            // echo json_encode($manage_prop_list);
            // exit();
    $manage_prop_list->save();

}
}
//exit();   
 return redirect()->route('manage_prop')->with(['success'=>'Successfully Updated !']);   
}

public function delete_added_prop_list(Request $request)
{
  // dd(1);
    ManagePropList::where('id',$request->id)->delete();

    return back();
}


function get_prop_list(Request $request){
  $prop_list=ManagePropList::
  where('manage_prop_id',$request->id)->get();
  $view=view('masters.prop_list',compact('prop_list'))->render();
  return response()->json($view);
}

public function manage_prop_destroy($id){
    ManageProp::find($id)->delete();

   return redirect(route('manage_prop'))->with('success', 'Manage Prop Deleted Successfully');
}

public function issue_prop_store(Request $request){
    // dd($request->all());
  $request ->validate([
      'date'=>'required',
      'emp_code'=>'required',
      'school_code'=>'required',
      'prop_id1'=>'required',
      'quntity1'=>'required',
      
  ]);


$issue_prop = new IssueProp();
$issue_prop->date = $request->date;
$issue_prop->emp_code= $request->emp_code;
$issue_prop->school_code= $request->school_code;
$issue_prop->save(); 

foreach($request->prop_id1 as $key=>$prop_id){
 $issue_prop_list = new IssuePropList();
 $issue_prop_list->issue_prop_id= $issue_prop->id;
 $issue_prop_list->prop_id= $prop_id;
 $issue_prop_list->quntity= $request->quntity1[$key];
 $issue_prop_list->save();
}

  return redirect()->back()->with('success', 'Issue Prop Added Successfully');
}

public function issue_prop_edit(Request $request)
  {
      $issue_prop_edit = IssueProp::find($request->id); 
      $issue_prop_list_edit = IssuePropList::where('issue_prop_id',$issue_prop_edit->id)->get(); 
      $vendor = Vendor:: select('id','vendor_name')->get();
      $prop = Prop:: select('id','prop_name')->get();
      $emp = Employee:: select('id','emp_code')->get();
      $school = School:: select('id','school_code')->get();
     
  return view('masters.issue_prop_edit',compact('issue_prop_edit','vendor','prop','emp','school','issue_prop_list_edit'));

  }

public function update_issue_prop(Request $request)
{
  $issue_prop = IssueProp::find($request->id);
  $issue_prop->date = $request->date;
  $issue_prop->emp_code= $request->emp_code;
  $issue_prop->school_code= $request->school_code;
  $issue_prop->save(); 

    $insert_id=$issue_prop->id;

    // MobileSeriesId::where('mobile_module_id',$mobile_module->id)->delete();
    for($i=0;$i<count($request->prop_id); $i++){
        if (isset($request->prop_id[$i])){
            if (isset($request->existing_id[$i])){
                $issue_prop_list=IssuePropList::find($request->existing_id[$i]); //if me tb ayega jb uske pass existing ids rahegi  
            }else{                   //  else me - agar existing record present nhi hai to new record create kr ne ke liye use kiya

            $issue_prop_list=new IssuePropList;
            $issue_prop_list->issue_prop_id=$insert_id;
            }
            $issue_prop_list->prop_id= $request->prop_id[$i];
            $issue_prop_list->quntity= $request->quntity[$i];

            // echo json_encode($issue_prop_list);
            // exit();
            $issue_prop_list->save();
            }
          }
return redirect(route('manage_prop'))->with('success', 'Issue Prop Updated Successfully');
}


public function delete_added_issue_prop_list(Request $request)
{
  // dd(1);
    IssuePropList::where('id',$request->id)->delete();

    return back();
}


function get_issue_prop_list(Request $request){
  $issue_prop_list=IssuePropList::
  where('issue_prop_id',$request->id)->get();
  $view=view('masters.issue_prop_list',compact('issue_prop_list'))->render();
  return response()->json($view);
}

public function issue_prop_destroy($id){
   IssueProp::find($id)->delete();

  return redirect(route('manage_prop'))->with('success', 'Issue Prop Deleted Successfully');
}
}
