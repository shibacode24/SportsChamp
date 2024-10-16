<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
      
        return view('masters.blog',compact('blog'));
    }

    // public function blog_store(Request $request){
    //     //   dd($request->all());
    //     $request ->validate([
    //         'author_name'=>'required',
    //         'date'=>'required',
    //         'title'=>'required',
    //         'image'=>'required',
    //         'content'=>'required',
            
    //     ]);
      
    //     $filename="";
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('images/blog_image'), $filename);
    
    //     } 
    
    //   $blog = new Blog();
    //   $blog->author_name = $request->author_name;
    //   $blog->date= $request->date;
    //   $blog->title= $request->title;
    //   $blog->content= $request->content;
    //   $blog->image=$filename;
    
    // $blog->save(); 

    //     return redirect()->back()->with('success', 'Blog Added Successfully');
    // }

    public function blog_store(Request $request)
    {
        // Validate the request
        $request->validate([
            'author_name' => 'required',
            'date' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'content' => 'required',
        ]);
    
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/blog_image'), $filename);
        }
    
        // Save the blog data to the database
        $blog = new Blog();
        $blog->author_name = $request->author_name;
        $blog->date = $request->date;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $filename;
        $blog->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Blog Added Successfully');
    }
    


    public function blog_edit(Request $request)
        {
            $blog_edit = Blog::find($request->id); 
           
        return view('masters.blog_edit',compact('blog_edit'));

        }

    public function update_blog(Request $request)
    {

        $blog =  Blog::where('id',$request->id)->first();

        
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/blog_image'), $filename);
            $blog->image=$filename;

        }
        
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/blog_image'), $filename);
        //     $blog->image=$filename;
    
        // } 

           $blog->author_name = $request->author_name;
           $blog->date= $request->date;
           $blog->title= $request->title;
           $blog->content= $request->content ? $request->content : $blog->content;
           $blog->save();

      
      
    return redirect(route('blog'))->with('success', 'Blog Updated Successfully');
    }

    public function blog_destroy($id){
       Blog::find($id)->delete();

        return redirect(route('blog'))->with('success', 'Blog Deleted Successfully');
    }
}
