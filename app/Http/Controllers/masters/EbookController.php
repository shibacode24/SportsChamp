<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\masters\Grade;
use App\Models\masters\Ebook;

class EbookController extends Controller
{
   
    public function index()
    {
        $grade = Grade::all();
        $ebooks = Ebook::all();
      
        return view('masters.e_book',compact('grade','ebooks'));
    }

    public function ebook_store(Request $request){
        //  dd($request->all());
        $request ->validate([
            'grade_id'=>'required',
            'date'=>'required',
            'title'=>'required',
            //'pdf'=>'required',
            
        ]);
      
        $filename="";
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pdf'), $filename);
    
        } 
       
      $ebook = new Ebook();
      $ebook->grade_id = $request->grade_id;
      $ebook->date= $request->date;
      $ebook->title= $request->title;
      $ebook->pdf=$filename;
    
    $ebook->save(); 

        return redirect()->back()->with('success', 'Ebook Added Successfully');
    }

    public function ebook_edit(Request $request)
        {
            $ebook_edit = Ebook::find($request->id); 
            $grade = Grade::all();
           
        return view('masters.ebook_edit',compact('ebook_edit','grade'));

        }

    public function update_ebook(Request $request)
    {
        $ebook =  Ebook::where('id',$request->id)->first();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pdf'), $filename);
            $ebook->pdf=$filename;
    
        } 

            $ebook->grade_id = $request->grade_id;
            $ebook->date= $request->date;
            $ebook->title= $request->title;
            $ebook->save();

      
      
    return redirect(route('ebook'))->with('success', 'Ebook Updated Successfully');
    }

    public function ebook_destroy($id){
       Ebook::find($id)->delete();

        return redirect(route('ebook'))->with('success', 'Ebook Deleted Successfully');
    }
}
