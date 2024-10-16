<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\SportsShop;
use Illuminate\Http\Request;

class Sports_ShopController extends Controller
{
    public function index()
    {
        $sports_shop = SportsShop::all();
      
        return view('masters.sports_shop',compact('sports_shop'));
    }

    public function sports_shop_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'title'=>'required',
            'image'=>'required',    
        ]);
      
        // $filename="";
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/sports_shop_image'), $filename);
    
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
            $file->move(public_path('images/sports_shop_image'), $filename);
        }
    
      $sports_shop = new SportsShop();
      $sports_shop->title= $request->title;
      $sports_shop->image=$filename;
    
    $sports_shop->save(); 

        return redirect()->back()->with('success', 'Sports Shop Added Successfully');
    }

    public function sports_shop_edit(Request $request)
        {
            $sports_shop_edit = SportsShop::find($request->id); 
           
        return view('masters.edit_sports_shop',compact('sports_shop_edit'));

        }

    public function update_sports_shop(Request $request)
    {
// dd($request->all());
        $sports_shop =  SportsShop::where('id',$request->id)->first();
        // echo json_encode($sports_shop);
        
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/sports_shop_image'), $filename);
        //     $sports_shop->image=$filename;
    
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
            $file->move(public_path('images/sports_shop_image'), $filename);
            $sports_shop->image=$filename;
        }
           $sports_shop->title= $request->title;
           $sports_shop->save();

      
      
    return redirect(route('sports_shop'))->with('success', 'Sports Shop Updated Successfully');
    }

    public function sports_shop_destroy($id){
        SportsShop::find($id)->delete();

        return redirect(route('sports_shop'))->with('success', 'Sports Shop Deleted Successfully');
    }
}
