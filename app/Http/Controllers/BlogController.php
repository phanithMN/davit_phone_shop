<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function Blog(Request $request) {
        $blogs = Blog::paginate(10);
        return view('page.blogs.index', ['blogs'=>$blogs]);
    }

    public function Insert() {
        return view('page.blogs.insert');
    }

    public function InsertData(Request $request) {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->date = $request->input('date');
        $blog->description = $request->input('description');
        if(Auth::id()) {
            $blog->user_name = Auth::user()->name;
        }   
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/blogs', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->route('blog-ad')->with('message', 'Blog Inserted Successfully');
    }

    
    // update 
    public function Update($id) {
        $blog = Blog::find($id);
        return view('page.blogs.edit', ['blog'=>$blog]);
    }

    public function DataUpdate(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->date = $request->input('date');
        $blog->description = $request->input('description');
        if(Auth::id()) {
            $blog->user_name = Auth::user()->name;
        }   
        if($request->hasFile('image'))
        {
            $destination = 'uploads/banner'. $blog->image;
            if(Blog::exists($destination))
            {
                Blog::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/blogs', $filename);
            $blog->image = $filename;
            
        }
        $blog->update();
        
        return redirect()->route('blog-ad')->with('message','Blog Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Blog::destroy($request->id);
            return redirect()->route('blog-ad');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
