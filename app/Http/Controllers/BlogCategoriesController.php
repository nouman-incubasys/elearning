<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\BlogCategory;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class BlogCategoriesController extends Controller
{
    public function index()
    {
        $data['blog_category'] = BlogCategory::all();
        return view('blogcategory.index')->with($data);
    }
    
    public function create()
    {
        return view('blogcategory.create');
    }
    
    public function store()
    { 
        $input = Request::all();
        
        //saving data
        $book = new BlogCategory();
        $book->category = $input['blog_category'];
        $book->save();
        return redirect('/admin/blogcategory');
    }
    
    public function edit($id)
    {
        $data['blog_category'] = BlogCategory::find($id);
        return view('blogcategory.edit')->with($data);
    }
}
