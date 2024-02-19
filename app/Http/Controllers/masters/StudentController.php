<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\Student;

class StudentController extends Controller
{
    function student_import(){
        $students = Student::select('id','created_at','school_code', DB::raw('COUNT(*) as student_count'))
        ->groupBy('school_code')
        ->get();
           
        return view('masters.student',compact('students'));
        
    }

    public function student_excel_import(Request $request){
        Excel::import(new StudentsImport, $request->file('excel_file')->store('temp'));

        return redirect()->back()->with('success', 'Students imported successfully.');
 
    }

    function get_Student_list(Request $request){
        $student_list=Student::
        where('school_code',$request->school_code)->get();
        $view=view('masters.student_list',compact('student_list'))->render();
        return response()->json($view);
    }

    function delete_student_school_code(Request $request){
        $student_list=Student::
        where('school_code',$request->school_code)->delete();
        return redirect()->back()->with('success', 'Students deleted successfully.');

    }
    
}
