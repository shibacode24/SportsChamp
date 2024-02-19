<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Assessment;
use App\Models\Attendance;
use App\Models\DamageProp;
use App\Models\Leave;
use App\Models\masters\ActivityMaster;
use App\Models\masters\Blog;
use App\Models\masters\Ebook;
use App\Models\masters\Employee;
use App\Models\masters\Grade;
use App\Models\masters\IssueProp;
use App\Models\masters\IssuePropList;
use App\Models\masters\ManageVideo;
use App\Models\masters\Prop;
use App\Models\masters\Section;
use App\Models\masters\Category;
use App\Models\masters\Curriculum;
use App\Models\NeedHelp;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Hash;
use DB;

class ApiController extends Controller
{

    public function user_login(Request $request)
    {
        $user = Student::where('username', '=', $request->username)->first();
    
         if ($user && Hash::check($request->password, $user->password))
    {
        
            return response()->json(['status'=>true,'data' =>$user,'message'=>'Login Successfull']);
        }else{
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
    }

    
   public function blog()
   {
    $blog = Blog :: get();

    if($blog->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$blog]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Blog Found']);
      
    }
   }

   public function blog_data(Request $request)
   {
    $blog_data = Blog :: where('id',$request->blog_id)->get();

    if($blog_data->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$blog_data]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Blog Found']);
      
    }
   }

   public function video()
   {
    $video = ManageVideo :: get();
    
    if($video->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$video]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Video Found']);
      
    }
   }

   public function notification()
   {
    $notification = Notification :: where('select_user','Users')->get();
    
   if($notification->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$notification]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Notification Found']);
      
    }
   }

   public function profile(Request $request)
   {
    $profile = Student :: where('id',$request->user_id)->first();
    
   if($profile)
    {
    return response()->json(['status'=>true ,'data'=>$profile]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No profile Found']);
      
    }
   }
 
//--------------------------emp functions--------------------------------------------//

public function emp_login(Request $request)
{
    $emp = Employee::where('username', '=', $request->username)->first();

     if ($emp && Hash::check($request->password, $emp->password))
    {
        return response()->json(['status'=>true,'data' =>$emp,'message'=>'Login Successfull']);
    }else{
        return response()->json(['status'=>false,'message'=>'data not found']);
    }
}

public function get_grade()
{
 $grade = Grade :: get();
 
 if($grade->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$grade]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No grade Found']);
   
 }
}

public function get_section()
{
 $section = Section :: get();
 
 if($section->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$section]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No section Found']);
   
 }
}

public function get_e_book(Request $request)
{
 $e_book = Ebook :: where('grade_id',$request->grade_id)
 ->get();
 
 if($e_book->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$e_book]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No e_book Found']);
   
 }
}

public function get_student()
{
 $student = Student :: get();
 
 if($student->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$student]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No student Found']);
   
 }
}

public function get_issued_prop()
{
 $issued_prop = IssueProp :: get();
 
 if($issued_prop->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$issued_prop]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No issued_prop Found']);
   
 }
}

public function get_prop()
{
 $prop = Prop :: get();
 
 if($prop->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$prop]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No prop Found']);
   
 }
}

public function emp_notification()
{
 $emp_notification = Notification :: where('select_user','Employee')->get();
 
if($emp_notification->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$emp_notification]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No Notification Found']);
   
 }
}

public function emp_profile(Request $request)
{
 $emp_profile = Employee :: where('id',$request->emp_id)->first();
 
if($emp_profile)
 {
 return response()->json(['status'=>true ,'data'=>$emp_profile]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No profile Found']);
   
 }
}

public function attendance(Request $request)
{
    $attendance = Attendance:: create([
        'emp_id' => $request->emp_id,
        'date' => $request->date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

 return response()->json(['status'=>true ,'message'=>'Attendance Submitted Successfully']);

}

public function post_activity(Request $request)
{
    $activity = Activity:: create([
        'grade_id' => $request->grade_id,
        'section_id' => $request->section_id,
        'category' => $request->category,
        'activity_id' => $request->activity_id,
        'remark' => $request->remark,

    ]);

 return response()->json(['status'=>true ,'message'=>'Activity Submitted Successfully']);

}

public function post_assessment(Request $request)
{
    $fileName = '';

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/assessment_file'), $fileName);
        // $filename = $fileName;
    }
    $assessment = Assessment::create([
        'grade_id' => $request->grade_id,
        'section_id' => $request->section_id,
        'file' => $fileName,
    ]);

    if ($assessment) {
        return response()->json(['status' => true, 'message' => 'Assessment Submitted Successfully']);
    } else {
        return response()->json(['status' => false, 'message' => 'Failed to submit assessment'], 500);
    }
}


public function get_assessment(Request $request)
{
    $assessment = DB::table('assessment');

    if(isset($request->from_date) && isset($request->to_date)) {
        $assessment = $assessment->whereDate('assessment.created_at', '<=', $request->to_date)
                            ->whereDate('assessment.created_at', '>=', $request->from_date);
    }
    $assessment = $assessment->leftJoin('section', 'section.id', '=', 'assessment.section_id')
                        ->leftJoin('grade', 'grade.id', '=', 'assessment.grade_id')
                        ->where('assessment.section_id', $request->section_id)
                        ->where('assessment.grade_id', $request->grade_id)
                        ->select('assessment.*', 'grade.grade', 'section.section_name')
                        ->get();
                       
    if($assessment->isNotEmpty()) {
        return response()->json(['status' => true, 'data' => $assessment]);
    } else {
        return response()->json(['status' => false, 'message' => 'No Assessment Found']);
    }
}

public function post_damage_prop(Request $request)
{
    $damageprop = DamageProp:: create([
        'emp_id' => $request->emp_id,
        'prop_id' => $request->prop_id,
        'quantity' => $request->quantity,
        'date' => $request->date,
        'reason' => $request->reason,
    ]);

 return response()->json(['status'=>true ,'message'=>'Damageprop Submitted Successfully']);

}

public function post_leave(Request $request)
{
    $leave = Leave:: create([
        'emp_id' => $request->emp_id,
        'leave_type' => $request->leave_type,
        'from_date' => $request->from_date,
        'to_date' => $request->to_date,
        'reason' => $request->reason,
        'status' => 'pending',
    ]);

 return response()->json(['status'=>true ,'message'=>'Leave Submitted Successfully']);

}

public function get_activity(Request $request)
{
 $activity = Activity ::with(['grade:id,grade', 'section:id,section_name'])
 -> where('grade_id',$request->grade_id)
->get();
 
 if($activity->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$activity]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No Activity Found']);
   
 }
}

// public function get_activity(Request $request)
// {
//     $activity = DB::table('activity');

//     if(isset($request->from_date) && isset($request->to_date)) {
//         $activity = $activity->whereDate('activity.created_at', '<=', $request->to_date)
//                             ->whereDate('activity.created_at', '>=', $request->from_date);
//     }

//     $activity = $activity->leftJoin('section', 'section.id', '=', 'activity.section_id')
//                         ->leftJoin('grade', 'grade.id', '=', 'activity.grade_id')
//                         ->where('activity.section_id', $request->section_id)
//                         ->where('activity.grade_id', $request->grade_id)
//                         ->select('activity.*', 'grade.grade', 'section.section_name')
//                         ->get();
                       
//     if($activity->isNotEmpty()) {
//         return response()->json(['status' => true, 'data' => $activity]);
//     } else {
//         return response()->json(['status' => false, 'message' => 'No Activity Found']);
//     }
// }

public function get_activity_master()
{
 $get_activity_master = ActivityMaster :: get();
 
 if($get_activity_master->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$get_activity_master]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No Activity Found']);
   
 }
}

public function get_leave(Request $request)
{
 $get_leave = Leave :: 
 join('employee','employee.id','=','leave.emp_id')
 ->where('emp_id',$request->emp_id)
 ->select('leave.*','employee.name')
 ->get();
 
 if($get_leave->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$get_leave]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No Leave Found']);
   
 }
}

public function post_attendance(Request $request)
{
 
   $insert=Attendance::create(
       [
    'emp_id'=>$request->emp_id, 
    'start_time'=>date('G:i',strtotime($request->time)),
    'date'=>$request->date,
   'end_time'=>$request->in_out,
   ]);
   if($insert->id)
   {
       return response()->json(['status'=>true,'message'=>'Attendance Recorded Successfully']);
   }
   else{
       return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
   }
}
public function check_in_out(Request $request)
{
 $check_in_out=Attendance::where('emp_id',$request->emp_id)
 ->where('date',date('Y-m-d'))->OrderBy('id','desc')->first();
 if($check_in_out)
 {
   return response()->json(['status'=>true,'message'=>'Record Found','in_out' => $check_in_out->in_out]);
 }
 else{
   return response()->json(['status'=>false,'message'=>'Record Not Found','in_out' => 'out']);
 }
}

public function get_issueprop_by_emp_code(Request $request)
{
    $get_issueprop_by_emp_code = IssueProp :: 
    join('employee','employee.id','=','issue_prop.emp_code')
    ->join('issue_prop_list','issue_prop_list.issue_prop_id','=','issue_prop.id')
    ->leftjoin('prop','prop.id','=','issue_prop_list.prop_id')
    ->where('issue_prop.emp_code',$request->emp_id)
    ->select('issue_prop.*','employee.name','issue_prop_list.*','prop.prop_name')
    ->get();

    if($get_issueprop_by_emp_code->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$get_issueprop_by_emp_code]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Record Found']);
      
    }
}

public function get_damage_prop(Request $request)
{
    $get_damage_prop = DamageProp :: 
    join('prop','prop.id','=','damage_prop.prop_id')
    ->where('damage_prop.emp_id',$request->emp_id)
    ->select('damage_prop.*','prop.prop_name')
    ->get();

    if($get_damage_prop->isNotEmpty())
    {
    return response()->json(['status'=>true ,'data'=>$get_damage_prop]);
    }
    else{
    return response()->json(['status'=>false ,'message'=>'No Record Found']);
      
    }
}

public function post_need_help(Request $request)
{
    $help = NeedHelp :: create([
        'student_id' => $request->user_id,
        'user_name' => $request->user_name,
        'mobile_no' => $request->mobile_no,
        'msg' => $request->msg,
    ]);
    if($help->id)
    {
        return response()->json(['status'=>true,'message'=>'Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    }
}

public function delete_assessment(Request $request)
{
    $assess= Assessment::where('id',$request->id)->delete();

    if($assess)
    {
        return response()->json(['status'=>true,'message'=>'Recorded Deleted Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    }
}

public function delete_prop(Request $request)
{
    $prop= IssueProp::where('id',$request->id)->delete();

    $prop_list= IssuePropList::where('issue_prop_id',$request->id)->delete();

    
    if($prop_list)
    {
        return response()->json(['status'=>true,'message'=>'Recorded Deleted Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    }
}

public function delete_damage_prop(Request $request)
{
    $damage_prop= DamageProp::where('id',$request->id)->delete();
    
    if($damage_prop)
    {
        return response()->json(['status'=>true,'message'=>'Recorded Deleted Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    }
}

public function post_reporting(Request $request)
{
    $filenames = [];

    // Check if files are present in request
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/assessment_files'), $fileName);
            $filenames[] = $fileName;
        }
    }

    foreach ($filenames as $filename) {
    $report = Reporting::create([
        'grade_id' => $request->grade_id,
        'section_id' => $request->section_id,
        'curriculum_id' => $request->curriculum_id,
        'female_kid' => $request->female_kid,
        'male_kid' => $request->male_kid,
        'photo' => $filename,
        'feedback' => $request->feedback,
        'remark' => $request->remark,
    ]);
}

    if ($report) {
        return response()->json(['status' => true, 'message' => 'Report Submitted Successfully']);
    } else {
        return response()->json(['status' => false, 'message' => 'Failed to submit report']);
    }
}

        public function get_category()
        {
            $category = Category :: get();
            
            if($category->isNotEmpty())
            {
            return response()->json(['status'=>true ,'data'=>$category]);
            }
            else{
            return response()->json(['status'=>false ,'message'=>'No category Found']);
            
            }
        }

        public function get_curriculum()
        {
            $curriculum = Curriculum :: get();
            
            if($curriculum->isNotEmpty())
            {
            return response()->json(['status'=>true ,'data'=>$curriculum]);
            }
            else{
            return response()->json(['status'=>false ,'message'=>'No curriculum Found']);
            
            }
        }

     public function get_report(Request $request)
     {
            $get_report = Reporting :: with('grade: grade','section: section_name','curriculum:name');
            if(isset($request->from_date) && isset($request->to_date)) {
                $get_report = $get_report->whereDate('reporting.created_at', '<=', $request->to_date)
                                    ->whereDate('reporting.created_at', '>=', $request->from_date);
            }
            $get_report = $get_report ->get();

        if($get_report->isNotEmpty())
            {
            return response()->json(['status'=>true ,'data'=>$get_report]);
        }
        else{
        return response()->json(['status'=>false ,'message'=>'No Data Found']);
        
        }

     }

}
