<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\BlogCategory;
use App\Blog;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class BlogsController extends Controller
{
    public function index()
    {
        $data['blog'] = Blog::all();
        return view('blog.index')->with($data);
    }
    
    public function create()
    {
        $data['blog_category'] = BlogCategory::all();
        return view('blog.create')->with($data);
    }
    
    public function edit($id)
    {
        $data['blog_category'] = BlogCategory::all();
        $data['blog'] = Blog::find($id);
        return view('blog.edit')->with($data);
    }
    
    public function store(Request $request)
    { 
        $input = $request->input();
                
        $destinationPath = 'uploads/blog'; // upload path
        
        $extension1 = $request->file('blog_icon')->getClientOriginalExtension(); // getting image extension
        $fileName1 = rand(11111,99999).'.'.$extension1; // renameing image
        $request->file('blog_icon')->move($destinationPath, $fileName1); // uploading file to given path
        
        //saving data
        $blog = new Blog();
        $blog->title = $input['blog_title'];
        $blog->content = $input['blog_content'];
        $blog->category_id = $input['blog_category'];
        $blog->blog_icon = URL::to('/uploads/blog').'/'. $fileName1;
        $blog->save();
        return redirect('/admin/blog');
    }
    
    public function updateBlog($id)
    { 
        $input = Input::all();
        
        $destinationPath = 'uploads/blog'; // upload path
        
        $extension1 = $input['blog_icon']->getClientOriginalExtension(); // getting image extension
        $fileName1 = rand(11111,99999).'.'.$extension1; // renameing image
        $input['blog_icon']->move($destinationPath, $fileName1); // uploading file to given path
        
        //saving data
        $blog = Blog::find($id);
        $blog->title = $input['blog_title'];
        $blog->content = $input['blog_content'];
        $blog->category_id = $input['blog_category'];
        $blog->blog_icon = URL::to('/uploads/blog').'/'. $fileName1;
        $blog->save();
        return redirect('/admin/blog');
    }
    
    public function DeleteBlog($id){
        $result = Blog::find($id);
        $result->delete();
        return redirect('/admin/blog');
    }
    
}
