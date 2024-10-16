<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\FitnessMantra;
use Illuminate\Http\Request;

class fitness_mantraController extends Controller
{
    public function index()
    {
        $fitness_mantra = FitnessMantra::all();
      
        return view('masters.fitness_mantra',compact('fitness_mantra'));
    }

    public function fitness_mantra_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'author_name'=>'required',
            'date'=>'required',
            'title'=>'required',
            'image'=>'required',
            'content'=>'required',
            
        ]);
      
        // $filename="";
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/fitness_mantra_image'), $filename);
    
        // } 
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/fitness_mantra_image'), $filename);
        }
    
      $fitness_mantra = new FitnessMantra();
      $fitness_mantra->author_name = $request->author_name;
      $fitness_mantra->date= $request->date;
      $fitness_mantra->title= $request->title;
      $fitness_mantra->content= $request->content;
      $fitness_mantra->image=$filename;
    
    $fitness_mantra->save(); 

        return redirect()->back()->with('success', 'FitnessMantra Added Successfully');
    }

    public function fitness_mantra_edit(Request $request)
        {
            $fitness_mantra_edit = FitnessMantra::find($request->id); 
           
        return view('masters.fitness_mantra_edit',compact('fitness_mantra_edit'));

        }

    public function update_fitness_mantra(Request $request)
    {

        $fitness_mantra =  FitnessMantra::where('id',$request->id)->first();
        
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/fitness_mantra_image'), $filename);
        //     $fitness_mantra->image=$filename;
    
        // } 
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/fitness_mantra_image'), $filename);
            $fitness_mantra->image=$filename;

        }

           $fitness_mantra->author_name = $request->author_name;
           $fitness_mantra->date= $request->date;
           $fitness_mantra->title= $request->title;
           $fitness_mantra->content= $request->content ? $request->content : $fitness_mantra->content;
           $fitness_mantra->save();

      
      
    return redirect(route('fitness_mantra'))->with('success', 'FitnessMantra Updated Successfully');
    }

    public function fitness_mantra_destroy($id){
       FitnessMantra::find($id)->delete();

        return redirect(route('fitness_mantra'))->with('success', 'FitnessMantra Deleted Successfully');
    }
}
