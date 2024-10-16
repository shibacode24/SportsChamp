<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Ebook_List;
use Illuminate\Http\Request;
use App\Models\masters\Grade;
use App\Models\masters\Ebook;
use Intervention\Image\Facades\Image;

class EbookController extends Controller
{
   
    public function index()
    {
        $grade = Grade::all();
        $ebooks = Ebook::groupby('grade_id')->get();
      
        return view('masters.e_book',compact('grade','ebooks'));
    }

    function get_ebook_list(Request $request){
        $ebook_lists= Ebook::
        where('grade_id',$request->id)
        ->select('image')
        ->get();
        $view=view('masters.ebook_list',compact('ebook_lists'))->render();
        return response()->json($view);
      }
      public function ebook_store(Request $request)
      {
          $request->validate([
              'grade_id' => 'required',
              'title' => 'required',
          ]);
      
          $image_name_array = [];
      
          // Loop through the images
          for ($i = 0; $i < count($request->image); $i++) {
              if (isset($request->image[$i])) {
                  $ebook_list = new Ebook();
                  $ebook_list->grade_id = $request->grade_id;
                  $ebook_list->title = $request->title;
      
                  foreach ($request->image as $key => $image) {
                      // Decode base64 image and get its extension
                      $extension = explode('/', mime_content_type($image))[1];
                      $data = base64_decode(substr($image, strpos($image, ',') + 1));
                      $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
      
                      // Define the path to save the image
                      $imgPath = public_path('images/ebook_image/') . $imgname;
      
                      // Save the raw image data temporarily
                      file_put_contents($imgPath, $data);
      
                      // Compress the image using the function from AppServiceProvider
                      app('compressImage')($imgPath, $extension);
      
                      // Add the image name to the array
                      $image_name_array[] = $imgname;
                  }
      
                  // Assign the compressed image names to the Ebook_List entry
                  $ebook_list->image = $image_name_array[$i];
                  $ebook_list->save();
              }
          }
      
          return redirect()->back()->with('success', 'Ebook Added Successfully');
      }
      


// public function compressImage($filePath, $extension)
// {
//     // Check if the file exists
//     if (!file_exists($filePath)) {
//         throw new \Exception("File does not exist: $filePath");
//     }

//     // Load the image
//     switch (strtolower($extension)) {
//         case 'jpeg':
//         case 'jpg':
//             $image = imagecreatefromjpeg($filePath);
//             if ($image === false) {
//                 throw new \Exception("Failed to create image from JPEG file.");
//             }
//             break;

//         case 'png':
//             $image = imagecreatefrompng($filePath);
//             if ($image === false) {
//                 throw new \Exception("Failed to create image from PNG file.");
//             }
//             break;

//         default:
//             throw new \Exception("Unsupported image format: $extension");
//     }

//     // Get original image dimensions
//     $originalWidth = imagesx($image);
//     $originalHeight = imagesy($image);

//     // Calculate new dimensions (50% of the original size)
//     $newWidth = $originalWidth * 0.5;
//     $newHeight = $originalHeight * 0.5;

//     // Create a new true color image with the new dimensions
//     $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

//     // Preserve transparency for PNG images
//     if (strtolower($extension) == 'png') {
//         imagealphablending($resizedImage, false);
//         imagesavealpha($resizedImage, true);
//         $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
//         imagefill($resizedImage, 0, 0, $transparent);
//     }

//     // Resize the original image to the new image
//     imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

//     // Save the resized image to the file path
//     switch (strtolower($extension)) {
//         case 'jpeg':
//         case 'jpg':
//             imagejpeg($resizedImage, $filePath, 80); // 80 is a reasonable quality for JPEG
//             break;

//         case 'png':
//             imagepng($resizedImage, $filePath, 7); // PNG compression level (0-9)
//             break;
//     }

//     // Free up memory
//     imagedestroy($image);
//     imagedestroy($resizedImage);
// }



//     public function ebook_store(Request $request){
//         //   dd($request->all());
//         $request ->validate([
//             'grade_id'=>'required',
//             'title'=>'required',  
//         ]);
    
//         // $ebook = new Ebook();
//         // $ebook->grade_id = $request->grade_id;
//         // $ebook->title= $request->title;
       
//         // $ebook->save(); 


//         //     $insert_id=  $ebook->id;

       
//             $image_name_array=[];
     
//     for($i=0;$i<count($request->image); $i++){
//         if (isset($request->image[$i])){
//             $ebook_list =new Ebook();
//             $ebook_list->grade_id = $request->grade_id;
//             $ebook_list->title= $request->title;
//             // $ebook_list->chapter_name = $request->chapter_name[$i];

//         foreach ($request->image as $key => $image) {
//             $extension = explode('/', mime_content_type($image))[1];
//             $data = base64_decode(substr($image, strpos($image, ',') + 1));
//             $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
//             file_put_contents(public_path('images/ebook_image') . '/' . $imgname, $data);
//             $image_name_array[] = $imgname;
//         }
        
//         // Assign the image names to the Ebook_List entry outside the loop
//         $ebook_list->image = $image_name_array[$i];
//             // echo json_encode($image_name_array);
//             // exit();
//             $ebook_list->save();
// }
//     }
//         return redirect()->back()->with('success', 'Ebook Added Successfully');
//     }


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
        // dd($id);
       Ebook_List::where('ebook_id',$id)->delete();
       Ebook::find($id)->delete();
        return redirect(route('ebook'))->with('success', 'Ebook Deleted Successfully');
    }
}

//server code
// public function ebook_store(Request $request){
//     //   dd($request->all());
//     $request ->validate([
//         'grade_id'=>'required',
//         'title'=>'required',  
//     ]);

//     // $ebook = new Ebook();
//     // $ebook->grade_id = $request->grade_id;
//     // $ebook->title= $request->title;
   
//     // $ebook->save(); 


//     //     $insert_id=  $ebook->id;

   
//         $image_name_array=[];
 
// for($i=0;$i<count($request->image); $i++){
//     if (isset($request->image[$i])){
//         $ebook_list =new Ebook();
//         $ebook_list->grade_id = $request->grade_id;
//         $ebook_list->title= $request->title;
//         // $ebook_list->chapter_name = $request->chapter_name[$i];

//     foreach ($request->image as $key => $image) {
//         $extension = explode('/', mime_content_type($image))[1];
//         $data = base64_decode(substr($image, strpos($image, ',') + 1));
//         $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
//         file_put_contents(public_path('images/ebook_image') . '/' . $imgname, $data);
//         $image_name_array[] = $imgname;
//     }
    
//     // Assign the image names to the Ebook_List entry outside the loop
//     $ebook_list->image = $image_name_array[$i];
//         // echo json_encode($image_name_array);
//         // exit();
//         $ebook_list->save();
// }
// }
//     return redirect()->back()->with('success', 'Ebook Added Successfully');
// }