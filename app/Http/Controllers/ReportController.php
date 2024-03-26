<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Attendance;
use App\Models\DamageProp;
use App\Models\Leave;
use App\Models\masters\Employee;
use App\Models\masters\Grade;
use App\Models\masters\IssueProp;
use App\Models\masters\IssuePropList;
use App\Models\masters\ManagePropList;
use App\Models\masters\School;
use App\Models\masters\Section;
use App\Models\Reporting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function assessment_report(Request $request)
   {

      $emp = Employee :: get();
      $grade = Grade :: get();
      $section = Section :: get();

      $assessment = Assessment :: 
      where('grade_id',$request->grade_id)
      ->where('section_id',$request->section_id)
      ->where('emp_id',$request->emp_id)
      ->select('assessment.*', DB::raw('count(roll_no) as total_student'));
      if(isset($request->from_date) && isset($request->to_date))
      {
            $assessment= $assessment->whereDate('created_at','<=',$request->to_date)
               ->whereDate('created_at','>=',$request->from_date);     
      }
      $assessment = $assessment->groupBy('excel_id')
      ->get();
   
      // $assessment = Assessment::with('excel_file')
      // ->where('grade_id', $request->grade_id)
      // ->where('section_id', $request->section_id)
      // ->where('emp_id', $request->emp_id)
      // ->select('assessment.*', DB::raw('count(distinct concat(roll_no, created_at)) as total_student'))
      // ->groupBy('created_at')
      // ->get();
  

//       echo json_encode($assessment);
// exit();

// dump($assessment);

    return view('report.assessmet_report', compact('emp','grade','section','assessment'));
   }

   function  get_assessment_data(Request $request){
      // dd($request->all());
      $assessments = Assessment :: 
      // where('grade_id',$request->grade_id)
      // ->where('section_id',$request->section_id)
      // ->where('emp_id',$request->emp_id)
      where('excel_id',$request->excel_id) 
      ->get();

      // echo json_encode($assessments);
      // exit();
      // dump($assessments);
      $view=view('report.assessment_report_list',compact('assessments'))->render();
      return response()->json($view);
    }

    public function emp_report(Request $request)
    {
 
       $emp = Employee :: get();
   
       $attendance = Attendance :: 
       where('emp_id',$request->emp_id);
       
       if(isset($request->from_date) && isset($request->to_date))
       {
             $attendance= $attendance->whereDate('created_at','<=',$request->to_date)
                ->whereDate('created_at','>=',$request->from_date);     
       }
       $attendance = $attendance->get();

       $leave = Leave :: 
       where('emp_id',$request->emp_id);
       
       if(isset($request->from_date) && isset($request->to_date))
       {
             $leave= $leave->whereDate('created_at','<=',$request->to_date)
                ->whereDate('created_at','>=',$request->from_date);     
       }
       $leave = $leave->get();
       
       $daily_report = Reporting :: 
       where('emp_id',$request->emp_id);
       
       if(isset($request->from_date) && isset($request->to_date))
       {
             $daily_report= $daily_report->whereDate('created_at','<=',$request->to_date)
                ->whereDate('created_at','>=',$request->from_date);     
       }
       $daily_report = $daily_report->get();
      //  echo json_encode($daily_report);
      //  echo json_encode($leave);
      //  echo json_encode($attendance);
      //  exit();
 
     return view('report.emp_report', compact('attendance','leave','daily_report','emp'));
    }

    public function prop_report(Request $request)
    {
 
      $emp = Employee :: get();
      
      //  $prop = IssuePropList :: join('issue_prop','issue_prop.id','issue_prop_list.issue_prop_id')
      // ->where('issue_prop.emp_code',$request->emp_id)
      //  ->select('issue_prop_list.*',
      //   'issue_prop.emp_code',
      //   'issue_prop.date',
      //   DB::raw('count(issue_prop_list.prop_id) as total_prop'));
      //  if(isset($request->from_date) && isset($request->to_date))
      //  {
      //        $prop= $prop->whereDate('issue_prop_list.created_at','<=',$request->to_date)
      //           ->whereDate('issue_prop_list.created_at','>=',$request->from_date);     
      //  }
      //  $prop = $prop
      //  ->get();

   //    $prop = IssueProp :: join('issue_prop_list','issue_prop_list.issue_prop_id','issue_prop.id')
   //    ->leftjoin('manage_prop_list','manage_prop_list.prop_id','issue_prop_list.prop_id')
   //   ->leftjoin('damage_prop','damage_prop.emp_id','issue_prop.emp_code')
   //    ->where('issue_prop.emp_code',$request->emp_id)
   //     ->select('issue_prop_list.*',
   //      'issue_prop.emp_code',
   //      'issue_prop.date',
   //      DB::raw('count(manage_prop_list.prop_id) as total_purchase_prop'),
   //      DB::raw('count(issue_prop_list.prop_id) as total_issue_prop'),
   //      DB::raw('count(damage_prop.prop_id) as total_damage_prop'),
   //    );
   //     if(isset($request->from_date) && isset($request->to_date))
   //     {
   //           $prop= $prop->whereDate('issue_prop_list.created_at','<=',$request->to_date)
   //              ->whereDate('issue_prop_list.created_at','>=',$request->from_date);     
   //     }
   //     $prop = $prop
   //     ->get();
   $prop = IssueProp::join('issue_prop_list', 'issue_prop_list.issue_prop_id', 'issue_prop.id')
   ->Join('manage_prop_list', 'manage_prop_list.prop_id', 'issue_prop_list.prop_id')
   ->leftJoin('damage_prop', 'damage_prop.emp_id', 'issue_prop.emp_code')
   ->leftJoin('prop', 'prop.id', 'issue_prop_list.prop_id') // Joining with the prop table
   ->where('issue_prop.emp_code', $request->emp_id)
   ->orwhere('damage_prop.emp_id', $request->emp_id)
   ->select(
       'issue_prop_list.prop_id',
       'issue_prop_list.quntity',
       'manage_prop_list.quntity as mg_qnt',
       'damage_prop.quantity',
       'prop.prop_name', // Selecting the property name from the prop table
       DB::raw('Sum(manage_prop_list.quntity) as total_purchase_prop'),
       DB::raw('Sum(issue_prop_list.quntity) as total_issue_prop'),
       DB::raw('Sum(damage_prop.quantity) as total_damage_prop')
   )
   ->groupBy('issue_prop_list.prop_id', 'prop.prop_name') // Grouping by prop_id and prop name
   ->get();

   echo json_encode($prop);
   exit();
//    $prop = IssueProp::join('issue_prop_list', 'issue_prop_list.issue_prop_id', 'issue_prop.id')
//    ->where('issue_prop.emp_code', $request->emp_id)
//    ->select(
//       //  DB::raw('Sum(manage_prop_list.quntity) as total_purchase_prop'),
//        DB::raw('Sum(issue_prop_list.quntity) as total_issue_prop'),
//       //  DB::raw('Sum(damage_prop.quantity) as total_damage_prop')
//    )
//    ->groupBy('issue_prop_list.prop_id') // Grouping by prop_id and prop name
//    ->get();

//    $manage_prop = ManagePropList::select(
//       DB::raw('sum(quntity) as total_purchase_prop'), 
//   )
//   ->groupBy('prop_id') // Grouping by prop_id and prop name
//   ->get();
         
//   $damage_prop = DamageProp::select(
//    DB::raw('sum(quantity) as total_damage_prop'), 
// )
// ->groupBy('prop_id') // Grouping by prop_id and prop name
// ->get();
$props = IssueProp::join('issue_prop_list', 'issue_prop_list.issue_prop_id', 'issue_prop.id')
    ->where('issue_prop.emp_code', $request->emp_id)
    ->select(
        'issue_prop_list.prop_id',
        DB::raw('SUM(issue_prop_list.quntity) as total_issue_prop')
    )
    ->groupBy('issue_prop_list.prop_id')
    ->get();

$manage_props = ManagePropList::select(
    'prop_id',
    DB::raw('SUM(quntity) as total_purchase_prop')
)
    ->groupBy('prop_id')
    ->get();

$damage_props = DamageProp::select(
    'prop_id',
    DB::raw('SUM(quantity) as total_damage_prop')
)
    ->groupBy('prop_id')
    ->get();

$merged_props = [];

// foreach ($props as $prop) {
//     $merged_props[$prop->prop_id]['total_issue_prop'] = $prop->total_issue_prop;
//     $merged_props[$prop->prop_id]['prop_id'] = $prop->prop_id;
// }

// foreach ($manage_props as $manage_prop) {
//     $merged_props[$manage_prop->prop_id]['total_purchase_prop'] = $manage_prop->total_purchase_prop;
//     $merged_props[$manage_prop->prop_id]['prop_id'] = $manage_prop->prop_id;
// }

// foreach ($damage_props as $damage_prop) {
//     $merged_props[$damage_prop->prop_id]['total_damage_prop'] = $damage_prop->total_damage_prop;
//     $merged_props[$damage_prop->prop_id]['prop_id'] = $damage_prop->prop_id;
// }

// // At this point, $merged_props will contain the merged data from all three queries.

// // Loop over the merged data to display or process it further
// foreach ($merged_props as $prop) {
//     echo "Property ID: " . $prop['prop_id'] . "\n";
//     echo "Total Purchase Quantity: " . ($prop['total_purchase_prop'] ?? 0) . "\n";
//     echo "Total Issue Quantity: " . ($prop['total_issue_prop'] ?? 0) . "\n";
//     echo "Total Damage Quantity: " . ($prop['total_damage_prop'] ?? 0) . "\n";
// }

    
//        exit();

     return view('report.prop_report', compact('emp','merged_props'));
    }

    public function student_report(Request $request)
    {
 
       $school = School :: get();
       $grade = Grade :: get();
       $section = Section :: get();
 
       $student = Student :: 
       where('class',$request->grade_id)
       ->where('section',$request->section_id)
       ->where('school_code',$request->school_code);
     
       if(isset($request->from_date) && isset($request->to_date))
       {
             $student= $student->whereDate('created_at','<=',$request->to_date)
                ->whereDate('created_at','>=',$request->from_date);     
       }
       $student = $student->get();

   // echo json_encode($student);
   // exit();
     return view('report.student_report', compact('student','grade','section','school'));
    }
    function  get_student_data(Request $request){
      // dd($request->all());
      $assessments = Assessment :: 
      where('grade_id',$request->grade_id)
      ->where('section_id',$request->section_id)
      ->where('name',$request->student_name)
      ->get();

      // echo json_encode($students);
      // exit();
   
      $view=view('report.student_report_list',compact('assessments'))->render();
      return response()->json($view);
    }
}
