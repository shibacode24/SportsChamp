<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Ebook_List;
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

    function get_ebook_list(Request $request){
        $ebook_lists= Ebook_List::
        where('ebook_id',$request->id)
        ->get();
        $view=view('masters.ebook_list',compact('ebook_lists'))->render();
        return response()->json($view);
      }

    public function ebook_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'grade_id'=>'required',
            'title'=>'required',  
        ]);
    
        $ebook = new Ebook();
        $ebook->grade_id = $request->grade_id;
        $ebook->title= $request->title;
       
        $ebook->save(); 


            $insert_id=  $ebook->id;

       
            $image_name_array=[];
     
    for($i=0;$i<count($request->page_no); $i++){
        if (isset($request->page_no[$i])){
            $ebook_list =new Ebook_List();
            $ebook_list->ebook_id = $insert_id;
            $ebook_list->page_no = $request->page_no[$i];
            $ebook_list->chapter_name = $request->chapter_name[$i];

        foreach ($request->image as $key => $image) {
            $extension = explode('/', mime_content_type($image))[1];
            $data = base64_decode(substr($image, strpos($image, ',') + 1));
            $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
            file_put_contents(public_path('images/ebook_image') . '/' . $imgname, $data);
            $image_name_array[] = $imgname;
        }
        
        // Assign the image names to the Ebook_List entry outside the loop
        $ebook_list->image = $image_name_array[$i];
            // echo json_encode($image_name_array);
            // exit();
            $ebook_list->save();
}
    }
        return redirect()->back()->with('success', 'Ebook Added Successfully');
    }
     //     $ebook_list =new Ebook_List();
        //     $ebook_list->ebook_id = $insert_id;
        //     $ebook_list->page_no = $request->input('page_no');
        //     $ebook_list->chapter_name = $request->input('chapter_name');

        // $image_name_array=[];
        // if (isset($request->image) && !empty($request->image)) 
        // {
        // foreach ($request->image as $key => $image) {
        // $extension= explode('/', mime_content_type($image))[1];
        // $data = base64_decode(substr($image, strpos($image, ',') + 1));
        // $imgname='e'.rand(000,999).$key . time() . '.' .$extension;
        // file_put_contents(public_path('images/ebook_image') . '/' . $imgname, $data);
        // $image_name_array[]=$imgname;
        // $ebook_list->image = $image_name_array;
        // }
        // }

        // // echo json_encode($ebook_list);
        // // exit();
        // $ebook_list->save();  

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
       Ebook_List::where('ebook_id',$id)->delete();
       Ebook::find($id)->delete();
        return redirect(route('ebook'))->with('success', 'Ebook Deleted Successfully');
    }
}
