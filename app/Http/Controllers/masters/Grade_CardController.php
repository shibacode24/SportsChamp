<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Grade;
use Illuminate\Http\Request;
use App\Models\masters\Grade_Card;


class Grade_CardController extends Controller
{
    public function index()
    {
        $grade_card = Grade_Card::all();
        $grade = Grade::all();
      
        return view('masters.grade_card',compact('grade_card','grade'));
    }

    public function grade_card_store(Request $request){
        // dd($request->all());
        $request ->validate([
            'grade_id'=>'required',
            'grade_content'=>'required',
            
        ]);
      
      $grade_card = new Grade_Card();
      $grade_card->grade_id = $request->grade_id;
      $grade_card->grade_content= $request->grade_content;

    //   echo json_encode($grade_card);
    //   exit();

      $grade_card->save(); 

        return redirect()->back()->with('success', 'Grade Card Added Successfully');
    }

    public function grade_card_edit(Request $request)
        {
            $grade_card_edit = Grade_Card::find($request->id); 
           $grade = Grade::all();
           
        return view('masters.grade_card_edit',compact('grade_card_edit','grade'));

        }

    public function update_grade_card(Request $request)
    {

        $grade_card =  Grade_Card::where('id',$request->id)->first();
        
        $grade_card->grade_id = $request->grade_id;
        $grade_card->grade_content= $request->grade_content;
       
        $grade_card->save(); 

      
      
    return redirect(route('grade_card'))->with('success', 'Grade Card Updated Successfully');
    }

    public function grade_card_destroy($id){
        Grade_Card::find($id)->delete();

        return redirect(route('grade_card'))->with('success', 'Grade Card Deleted Successfully');
    }
}