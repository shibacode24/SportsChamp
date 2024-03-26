<?php

namespace App\Http\Controllers;

use App\Models\masters\Employee;
use App\Models\masters\Grade;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Models\Time;
use Illuminate\Support\Facades\DB;


class TimeTableController extends Controller
{
    public function index()
    { 
        $emp = Employee::all();
        $grade = Grade::all();
      
        $time_table = TimeTable :: all();
        $time = Time :: join('timetable','timetable.time_id','=','time.id')
        ->select('time.*', DB::raw('SUM(no_of_class) as total_no_of_classes'))
                                        ->groupBy('time_id')
                                        ->get();

        
    //   echo json_encode($time);
    //   exit();
        return view('time_table',compact('time_table','emp','grade','time'));
    }

    function get_timetable_list(Request $request){
        $timetable_lists=TimeTable::
        where('time_id',$request->id)
        ->orderByRaw("FIELD(days,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday')")
        ->get();
        $view=view('timetable_list',compact('timetable_lists'))->render();
        return response()->json($view);
      }

    public function time_table_store(Request $request){

        $newArray = [];
		foreach ($request->grade_id as $value) {
			$exploded = explode(', ', $value);
			$newArray[] = $exploded;
		}
		$request->merge(['grade_id' => $newArray]);

    //  dd($request->all());
        $request ->validate([
            'emp_id'=>'required',
            'days'=>'required',
            'grade_id'=>'required',
            'no_of_class'=>'required',    
        ]);

        $time_table = new Time();
        $time_table->emp_id = $request->emp_id;
        $time_table->save(); 
       
        foreach($request->days as $key=>$days){
         $time_table_list = new TimeTable();
         $time_table_list->time_id= $time_table->id;
         $time_table_list->days= $days;
         $time_table_list->grade_id= $request->grade_id[$key];
         $time_table_list->no_of_class= $request->no_of_class[$key];

         $time_table_list->save();
  }
    //   $time_table = new TimeTable();
    //   $time_table->emp_id = $request->emp_id;
    //   $time_table->days= $request->days;
    //   $time_table->grade_id= $request->grade_id;
    //   $time_table->no_of_class= $request->no_of_class;

    // //   echo json_encode($time_table);
    // //   exit();

    //   $time_table->save(); 
    //     // }
        return redirect()->back()->with('success', 'TimeTable Added Successfully');
    }


    public function time_table_edit(Request $request)
        {
            $time_edit = Time ::find($request->id); 
            $time_tables = TimeTable ::where('time_id',$request->id)->get(); 
            $emp = Employee::all();
            $grade = Grade::all();
            $time_table = TimeTable::all();
          
        return view('edit_time_table',compact('time_tables','emp','grade','time_edit','time_table'));

        }

        public function time_delete(Request $request){
          
            TimeTable::where('id',$request->id)->delete();
            return back();
        }

    // public function update_time_table(Request $request)
    // {
    //     dd($request->all());
    //     $time_table =  Time::where('id',$request->id)->first();

    //     // $time_table->emp_id = $request->emp_id;
    //     // $time_table->save(); 
    //     // $insert_id=$time_table->id;

    //     $newArray = [];
	// 	foreach ($request->grade_id as $value) {
	// 		$exploded = explode(', ', $value);
	// 		$newArray[] = $exploded;
	// 	}
	// 	$request->merge(['grade_id' => $newArray]);


    //     for($i=0;$i<count($request->days); $i++){
    //         if (isset($request->days[$i])){
    //             if (isset($request->existing_id[$i])){
    //                 $time_table_list=TimeTable::find($request->existing_id[$i]); //if me tb ayega jb uske pass existing ids rahegi  
    //             }else{                   //  else me - agar existing record present nhi hai to new record create kr ne ke liye use kiya

    //             $time_table_list=new TimeTable;
    //             $time_table_list->time_id=$request->id;
    //             }

    //     $time_table_list->days=$request->days[$i];

    //     $time_table_list->grade_id=$request->grade_id[$i];

    //     $time_table_list->no_of_class=$request->no_of_class[$i];
    //     //  echo json_encode($time_table_list);
    //     $time_table_list->save();
    //         }
    //     }
    // return redirect(route('time_table'))->with('success', 'TimeTable Updated Successfully');
    // }
    

    public function update_time_table(Request $request)
    {
        // dd($request->all()); // Uncomment this line for debugging if needed
    
        // Retrieve the existing time table record associated with the time_id
        $time_table = Time::where('id', $request->id)->first();
    
        // Create an array to hold the new grade IDs
        $newArray = [];
        foreach ($request->grade_id as $value) {
            $exploded = explode(', ', $value);
            $newArray[] = $exploded;
        }
        $request->merge(['grade_id' => $newArray]);
    
        // Loop through each day and update or create time table records
        for ($i = 0; $i < count($request->days); $i++) {
            if (isset($request->days[$i])) {
                // Find the existing time table record if it exists
                $time_table_list = TimeTable::where('time_id', $request->id)
                    ->where('days', $request->days[$i])
                    ->first();
    
                // If the record doesn't exist, create a new one
                if (!$time_table_list) {
                    $time_table_list = new TimeTable;
                    $time_table_list->time_id = $request->id;
                    $time_table_list->days = $request->days[$i];
                }
    
                // Update the grade_id and no_of_class fields
                $time_table_list->grade_id = $request->grade_id[$i];
                $time_table_list->no_of_class = $request->no_of_class[$i];
    
                // Save the record
                $time_table_list->save();
            }
        }
    
        // Redirect with success message
        return redirect(route('time_table'))->with('success', 'TimeTable Updated Successfully');
    }
    

    public function time_table_destroy($id){
        Time::find($id)->delete();
        TimeTable::where('time_id',$id)->delete();
        return redirect(route('time_table'))->with('success', 'TimeTable Deleted Successfully');
    }
  
}
