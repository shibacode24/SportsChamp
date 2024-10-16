<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\ManageVideo;
use Illuminate\Http\Request;

class ManageVideoController extends Controller
{
    public function index()
    {
        $video = ManageVideo::all();
      
        return view('masters.manage_video',compact('video'));
    }

    public function manage_video_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'date'=>'required',
            'title'=>'required',
            'video_image'=>'required',
            'video_link'=>'required',
            
        ]);
      
        // $filename="";
        // if ($request->hasFile('video_image')) {
        //     $file = $request->file('video_image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/video_image'), $filename);
    
        // } 

        $filename = "";
        if ($request->hasFile('video_image')) {
            $file = $request->file('video_image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/video_image'), $filename);
        }
 
      $video = new ManageVideo();
      $video->date= $request->date;
      $video->title= $request->title;
      $video->video_link= $request->video_link;
      $video->video_image=$filename;
    
    $video->save(); 

        return redirect()->back()->with('success', 'Video Added Successfully');
    }

    public function manage_video_edit(Request $request)
        {
            $video_edit = ManageVideo::find($request->id); 
           
        return view('masters.edit_manage_video',compact('video_edit'));

        }

    public function update_manage_video(Request $request)
    {

        $video =  ManageVideo::where('id',$request->id)->first();
        
        // if ($request->hasFile('video_image')) {
        //     $file = $request->file('video_image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/video_image'), $filename);
        //     $video->video_image=$filename;
    
        // } 

        $filename = "";
        if ($request->hasFile('video_image')) {
            $file = $request->file('video_image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/video_image'), $filename);
            $video->video_image=$filename;
        }
 

           $video->date= $request->date;
           $video->title= $request->title;
           $video->video_link= $request->video_link;
           $video->save();

      
      
    return redirect(route('manage_video'))->with('success', 'Video Updated Successfully');
    }

    public function manage_video_destroy($id){
        ManageVideo::find($id)->delete();

        return redirect(route('manage_video'))->with('success', 'Video Deleted Successfully');
    }
}
