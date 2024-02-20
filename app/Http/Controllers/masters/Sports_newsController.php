<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\masters\Sports_news;
use Illuminate\Http\Request;

class Sports_newsController extends Controller
{
    public function index()
    {
        $news = Sports_news::all();
      
        return view('masters.sports_news',compact('news'));
    }

    public function sports_news_store(Request $request){
        //   dd($request->all());
        $request ->validate([
            'author_name'=>'required',
            'date'=>'required',
            'title'=>'required',
            'image'=>'required',
            'content'=>'required',
            
        ]);
      
        $filename="";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/sportsnews_image'), $filename);
    
        } 
    
      $news = new Sports_news();
      $news->author_name = $request->author_name;
      $news->date= $request->date;
      $news->title= $request->title;
      $news->content= $request->content;
      $news->image=$filename;
    
    $news->save(); 

        return redirect()->back()->with('success', 'News Added Successfully');
    }

    public function sports_news_edit(Request $request)
        {
            $news_edit = Sports_news::find($request->id); 
           
        return view('masters.sports_news_edit',compact('news_edit'));

        }

    public function update_sports_news(Request $request)
    {
// dd($request->all());
        $news =  Sports_news::where('id',$request->id)->first();
        // echo json_encode($news);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/sportsnews_image'), $filename);
            $news->image=$filename;
    
        } 

           $news->author_name = $request->author_name;
           $news->date= $request->date;
           $news->title= $request->title;
           $news->content= $request->content ? $request->content : $news->content;
        //    echo json_encode($news);
        //    exit();
           $news->save();

      
      
    return redirect(route('sports_news'))->with('success', 'News Updated Successfully');
    }

    public function sports_news_destroy($id){
        Sports_news::find($id)->delete();

        return redirect(route('sports_news'))->with('success', 'News Deleted Successfully');
    }
}
