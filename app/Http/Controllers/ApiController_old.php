<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Assessment;
use App\Models\AssessmentFiles;
use App\Models\Attendance;
use App\Models\DamageProp;
use App\Models\Leave;
use App\Models\masters\ActivityMaster;
use App\Models\masters\Blog;
use App\Models\masters\Ebook;
use App\Models\masters\Ebook_List;
use App\Models\masters\Employee;
use App\Models\masters\Grade;
use App\Models\masters\IssueProp;
use App\Models\masters\IssuePropList;
use App\Models\masters\ManageVideo;
use App\Models\masters\Prop;
use App\Models\masters\Section;
use App\Models\masters\Category;
use App\Models\masters\Curriculum;
use App\Models\masters\SportsShop;
use App\Models\masters\LiveClass;
use App\Models\masters\Yoga_Meditation;
use App\Models\masters\Sports_news;
use App\Models\masters\Events;
use App\Models\NeedHelp;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Reporting;
use Illuminate\Http\Request;
use App\Imports\AssessmentImport;
use App\Models\masters\FitnessMantra;
use App\Models\masters\ReasonType;
use Maatwebsite\Excel\Facades\Excel;
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

public function get_e_book_list(Request $request)
{
 $e_book_list = Ebook_List :: where('ebook_id',$request->book_id)
 ->get();
 
 if($e_book_list->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$e_book_list]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No e_book Found']);
   
 }
}

public function get_chapter_list(Request $request)
{
 $get_chapter_list = Ebook_List :: where('id',$request->chapter_id)
 ->get();
 
 if($get_chapter_list->isNotEmpty())
 {
 return response()->json(['status'=>true ,'data'=>$get_chapter_list]);
 }
 else{
 return response()->json(['status'=>false ,'message'=>'No Chapter Found']);
   
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

// public function post_assessment(Request $request)
// {
//     $fileName = '';

//     if ($request->hasFile('file')) {
//         $file = $request->file('file');
//         $fileName = time() . '_' . $file->getClientOriginalName();
//         $file->move(public_path('images/assessment_file'), $fileName);
//         // $filename = $fileName;
//     }
//     $assessment = Assessment::create([
//         'grade_id' => $request->grade_id,
//         'section_id' => $request->section_id,
//         'file' => $fileName,
//     ]);

   
//         Excel::import(new AssessmentImport, $request->file('file')->store('temp'));


//     if ($assessment) {
//         return response()->json(['status' => true, 'message' => 'Assessment Submitted Successfully']);
//     } else {
//         return response()->json(['status' => false, 'message' => 'Failed to submit assessment'], 500);
//     }
// }


public function post_assessment(Request $request)
{

    try {
        
        $excel_id = time();
        // Import data from Excel
        Excel::import(new AssessmentImport($request->grade_id, $request->section_id, $request->emp_id ,$excel_id), $request->file('file')->store('temp'));
    } catch (\Throwable $th) {
        // Handle exception if Excel import fails
        return response()->json(['status' => false, 'message' => 'Failed to import assessment data'], 500);
    }

	$fileName = '';

if ($request->hasFile('file')) {
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images/assessment_file'), $fileName);
}

$assessment = AssessmentFiles::create([

    'assessment_excel_id' => $excel_id,
    'emp_id' => $request->emp_id,
    'grade_id' => $request->grade_id,
    'section_id' => $request->section_id,
    'file' => $fileName,
]);
    // Return success response
    return response()->json(['status' => true, 'message' => 'Assessment Submitted Successfully']);
}



// public function get_assessment(Request $request)
// {
//     $assessment = DB::table('assessment');

//     if(isset($request->from_date) && isset($request->to_date)) {
//         $assessment = $assessment->whereDate('assessment.created_at', '<=', $request->to_date)
//                             ->whereDate('assessment.created_at', '>=', $request->from_date);
//     }
//     $assessment = $assessment->leftJoin('section', 'section.id', '=', 'assessment.section_id')
//                         ->leftJoin('grade', 'grade.id', '=', 'assessment.grade_id')
//                         ->where('assessment.section_id', $request->section_id)
//                         ->where('assessment.grade_id', $request->grade_id)
//                         ->select('assessment.*', 'grade.grade', 'section.section_name')
//                         ->get();
                       
//     if($assessment->isNotEmpty()) {
//         return response()->json(['status' => true, 'data' => $assessment]);
//     } else {
//         return response()->json(['status' => false, 'message' => 'No Assessment Found']);
//     }
// }


// public function get_assessment(Request $request)
// {
//     $assessment = DB::table('assessment_files');

//     if(isset($request->from_date) && isset($request->to_date)) {
//         $assessment->whereDate('assessment_files.created_at', '<=', $request->to_date)
//                    ->whereDate('assessment_files.created_at', '>=', $request->from_date);
//     }

//     $assessment = $assessment->leftJoin('section', 'section.id', '=', 'assessment_files.section_id')
//                              ->leftJoin('grade', 'grade.id', '=', 'assessment_files.grade_id')
//                              ->where('assessment_files.section_id', $request->section_id)
//                              ->where('assessment_files.grade_id', $request->grade_id)
//                              ->where('assessment_files.emp_id', $request->emp_id)
//                              ->select('assessment_files.*', 'grade.grade', 'section.section_name')
// 	          				 ->get();
//     if($assessment->isNotEmpty()) {
//         return response()->json(['status' => true, 'data' => $assessment]);
//     } else {
//         return response()->json(['status' => false, 'message' => 'No Assessment Found']);
//     }
// }

public function get_assessment(Request $request)
{
    $assessment = DB::table('assessment_files');

    if(isset($request->from_date) && isset($request->to_date)) {
        $assessment->whereDate('assessment_files.created_at', '<=', $request->to_date)
                   ->whereDate('assessment_files.created_at', '>=', $request->from_date);
    }

    $assessment = $assessment->leftJoin('section', 'section.id', '=', 'assessment_files.section_id')
                             ->leftJoin('grade', 'grade.id', '=', 'assessment_files.grade_id')
                             ->where('assessment_files.section_id', $request->section_id)
                             ->where('assessment_files.grade_id', $request->grade_id)
                             ->where('assessment_files.emp_id', $request->emp_id)
                             ->select('assessment_files.*', 'grade.grade', 'section.section_name')
	                         ->get();
    if($assessment->isNotEmpty()) {
        // foreach($assessment as $file) {
        //     $file->file = base64_encode(file_get_contents(public_path('images/assessment_file/' . $file->file))); 
        // }

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
    'time'=>date('G:i',strtotime($request->time)),
    'date'=>$request->date,
    'in_out'=>$request->in_out,
   ]);
   if($insert->id)
   {
       return response()->json(['status'=>true,'message'=>'Attendance Recorded Successfully']);
   }
   else{
       return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
   }
}
// public function check_in_out(Request $request)
// {
//  $check_in_out=Attendance::where('emp_id',$request->emp_id)
//  ->where('date',date('Y-m-d'))->OrderBy('id','desc')->first();
//  if($check_in_out)
//  {
//    return response()->json(['status'=>true,'message'=>'Record Found','in_out' => $check_in_out->in_out]);
//  }
//  else{
//    return response()->json(['status'=>false,'message'=>'Record Not Found','in_out' => 'out']);
//  }
// }

public function check_in_out(Request $request)
{
 $check_in_out=Attendance::where('emp_id',$request->emp_id)
 ->where('date',date('Y-m-d'))->OrderBy('id','desc')->first();
 if($check_in_out)
 {
   return response()->json(['status'=>true,'message'=>'Record Found','in_out' => $check_in_out->in_out]);
 }
 else{
   return response()->json(['status'=>false,'message'=>'Record Not Found','in_out' => 'not punch']);
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
    // $filenames = [];

    // // Check if files are present in request
    // if ($request->hasFile('files')) {
    //     foreach ($request->file('files') as $file) {
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('images/assessment_files'), $fileName);
    //         $filenames[] = $fileName;
    //     }
    // }

    // foreach ($filenames as $filename) {

        $new_name = "";
        if (isset($request->photo) && $request->photo != 'null') {
           $extension= explode('/', mime_content_type($request->photo))[1];
           $data = base64_decode(substr($request->photo, strpos($request->photo, ',') + 1));
           $new_name='report'.rand(000,999). time() . '.' .$extension;
           file_put_contents(public_path('images/report') . '/' . $new_name, $data);
           }
		 

    $report = Reporting::create([
        'emp_id' => $request->emp_id,
        'grade_id' => $request->grade_id,
        'section_id' => $request->section_id,
        'curriculum_id' => $request->curriculum_id,
        'female_kid' => $request->female_kid,
        'male_kid' => $request->male_kid,
        'photo' =>  $new_name,
        'feedback' => $request->feedback,
        'remark' => $request->remark,
        'classStatus' => $request->classStatus,
        'date' => $request->date,
        'reason' => $request->reason,
        'class_type' => $request->class_type,
        'reason_type' => $request->reason_type
        
    ]);

    if ($report) {
        return response()->json(['status' => true, 'message' => 'Report Submitted Successfully']);
    } else {
        return response()->json(['status' => false, 'message' => 'Failed to submit report']);
    }
}

public function post_report_no_data(Request $request)
{
    $report = Reporting::create([
    'classStatus' => $request->classStatus,
        'date' => $request->date,
        'reason' => $request->reason,
        'class_type' => $request->class_type,
        'reason_type' => $request->reason_type
    ]);
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

    //  public function get_report(Request $request)
    //  {
    //         $get_report = Reporting :: 
    //         leftjoin('grade','grade.id','=','reporting.grade_id')
    //         ->leftjoin('section','section.id','=','reporting.section_id')
    //         ->leftjoin('curriculum','curriculum.id','=','reporting.curriculum_id')
    //         ->select('curriculum.name','section.section_name','reporting.*','grade_grade');
    //         if(isset($request->from_date) && isset($request->to_date)) {
    //             $get_report = $get_report->whereDate('reporting.created_at', '<=', $request->to_date)
    //                                 ->whereDate('reporting.created_at', '>=', $request->from_date);
    //         }
    //         $get_report = $get_report ->get();

    //     if($get_report->isNotEmpty())
    //         {
    //         return response()->json(['status'=>true ,'data'=>$get_report]);
    //     }
    //     else{
    //     return response()->json(['status'=>false ,'message'=>'No Data Found']);
        
    //     }

    //  }


    public function get_report(Request $request)
    {
           $get_report = Reporting :: 
           leftjoin('grade','grade.id','=','reporting.grade_id')
           ->leftjoin('section','section.id','=','reporting.section_id')
           ->leftjoin('curriculum','curriculum.id','=','reporting.curriculum_id')
           ->leftjoin('reason_type','reason_type.id','=','reporting.reason_type')
           ->select('curriculum.name','section.section_name','reporting.*','grade.grade','reason_type.reason_name');
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
    
     public function get_sports_news(Request $request)
     {
         $sports_news = Sports_news :: get();
         
         if($sports_news->isNotEmpty())
         {
         return response()->json(['status'=>true ,'data'=>$sports_news]);
         }
         else{
         return response()->json(['status'=>false ,'message'=>'No Data Found']);
         
         }
     }

     public function sports_news(Request $request)
     {
         $sports_news = Sports_news :: where('id',$request->sports_id)->get();
         
         if($sports_news->isNotEmpty())
         {
         return response()->json(['status'=>true ,'data'=>$sports_news]);
         }
         else{
         return response()->json(['status'=>false ,'message'=>'No Data Found']);
         
         }
     }
     public function get_yoga_meditation()
     {
         $yoga_meditation = Yoga_Meditation :: get();
         
         if($yoga_meditation->isNotEmpty())
         {
         return response()->json(['status'=>true ,'data'=>$yoga_meditation]);
         }
         else{
         return response()->json(['status'=>false ,'message'=>'No Data Found']);
         
         }
     }

     public function get_live_class()
     {
         $live_class = LiveClass :: get();
         
         if($live_class->isNotEmpty())
         {
         return response()->json(['status'=>true ,'data'=>$live_class]);
         }
         else{
         return response()->json(['status'=>false ,'message'=>'No Data Found']);
         
         }
     }

     public function get_sports_shop()
     {
         $sports_shop = SportsShop :: get();
         
         if($sports_shop->isNotEmpty())
         {
         return response()->json(['status'=>true ,'data'=>$sports_shop]);
         }
         else{
         return response()->json(['status'=>false ,'message'=>'No Data Found']);
         
         }
     }  

     public function get_upcoming_event()
     {
         $upcomingEvents = Events::where('date', '>=', now()->toDateString())
             ->orderBy('date', 'asc')
             ->get();
     
         if ($upcomingEvents->isNotEmpty()) {
             return response()->json(['status' => true, 'data' => $upcomingEvents]);
         } else {
             return response()->json(['status' => false, 'message' => 'No Upcoming Event Found']);
         }
     }

            public function get_past_events()
        {
            $pastEvents = Events::where('date', '<', now()->toDateString())
                ->orderBy('date', 'desc')
                ->get();

            if ($pastEvents->isNotEmpty()) {
                return response()->json(['status' => true, 'data' => $pastEvents]);
            } else {
                return response()->json(['status' => false, 'message' => 'No Past Events Found']);
            }
        }

        public function user_reg(Request $request)
        {
            $user = Student ::create([
                'name' => $request->name,
                'email' => $request->email,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'address' => $request->address,
                'email' => $request->email,
                'dob' => $request->dob,
                'father_no' => $request->father_no,
                'mother_no' => $request->mother_no,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]); 
            if ($user->isNotEmpty()) {
                return response()->json(['status' => true, 'message' => 'Submitted Successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'No Past Events Found']);
            }
        }

        public function get_curriculum_against_class(Request $request)
        {
            $curriculum = Curriculum::where('grade_id',$request->grade_ids)->get();
            if ($curriculum) {
                return response()->json(['status' => true, 'data' => $curriculum]);
            } else {
                return response()->json(['status' => false, 'message' => 'No Past Events Found']);
            }
        }

                public function update_user(Request $request)
        {
            $new_name = "";
            if (isset($request->image) && $request->image != 'null') {
                $extension = explode('/', mime_content_type($request->image))[1];
                $data = base64_decode(substr($request->image, strpos($request->image, ',') + 1));
                $new_name = 'report' . rand(000, 999) . time() . '.' . $extension;
                file_put_contents(public_path('images/user_image') . '/' . $new_name, $data);
            }

            $user = Student::find($request->user_id); 
            
            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User Not Found']);
            }

            $user->name = $request->name ??  $user->name;
            $user->email = $request->email ?? $user->email;
            $user->father_name = $request->father_name ?? $user->father_name;
            $user->mother_name = $request->mother_name ?? $user->mother_name;
            $user->address = $request->address ?? $user->address;
            $user->dob = $request->dob ?? $user->dob;
            $user->father_no = $request->father_no ?? $user->father_no;
            $user->mother_no = $request->mother_no ?? $user->mother_no;
            $user->roll_no = $request->roll_no ?? $user->roll_no;
            $user->height = $request->height ?? $user->height;
            $user->weight = $request->weight ?? $user->weight;
            $user->class = $request->class ?? $user->class;
            $user->username = $request->username ?? $user->username;
            $user->password = Hash::make($request->password) ?? $user->password;
            $user->image = $new_name ?? $user->image;
            $user->save();

            return response()->json(['status' => true, 'message' => 'Updated Successfully']);
        }


            public function fitness_mantra()
            {
                $fitness_mantra = FitnessMantra :: get();

                if($fitness_mantra->isNotEmpty())
                {
                return response()->json(['status'=>true ,'data'=>$fitness_mantra]);
                }
                else{
                return response()->json(['status'=>false ,'message'=>'No Fitness Mantra Found']);
                
                }
            }

            public function fitness_mantra_data(Request $request)
            {
                $fitness_mantra_data = FitnessMantra :: where('id',$request->fitness_mantra_id)->get();

                if($fitness_mantra_data->isNotEmpty())
                {
                return response()->json(['status'=>true ,'data'=>$fitness_mantra_data]);
                }
                else{
                return response()->json(['status'=>false ,'message'=>'No Fitness Mantra Found']);
                
                }
            }

            public function get_reason_type()
            {
                $reason_type = ReasonType :: get();

                if($reason_type->isNotEmpty())
                {
                return response()->json(['status'=>true ,'data'=>$reason_type]);
                }
                else{
                return response()->json(['status'=>false ,'message'=>'No Reason Found']);
                
                }
            }

            public function get_assessment_by_rollno(Request $request)
            {
             $get_assessment_by_rollno = Assessment :: where('roll_no',$request->roll_no)->get();
             
             if($get_assessment_by_rollno->isNotEmpty())
             {
             return response()->json(['status'=>true ,'data'=>$get_assessment_by_rollno]);
             }
             else{
             return response()->json(['status'=>false ,'message'=>'No Data Found']);
               
             }
            }

            public function get_leave_for_principle()
            {
                $get_leave_for_principle = Leave :: get();

                if($get_leave_for_principle->isNotEmpty())
                {
                return response()->json(['status'=>true ,'data'=>$get_leave_for_principle]);
                }
                else{
                return response()->json(['status'=>false ,'message'=>'No Data Found']);
                
                }
            }

            public function get_reporting_for_principle()
            {
                $get_reporting_for_principle = Reporting :: get();

                if($get_reporting_for_principle->isNotEmpty())
                {
                return response()->json(['status'=>true ,'data'=>$get_reporting_for_principle]);
                }
                else{
                return response()->json(['status'=>false ,'message'=>'No Data Found']);
                
                }
            }
}
