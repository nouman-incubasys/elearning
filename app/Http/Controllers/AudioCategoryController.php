<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\AudioCategory;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class AudioCategoryController extends Controller
{
    public function index()
    {
        $data['category'] = AudioCategory::all();
        return view('category.index')->with($data);
    }
    
    public function create()
    {
        return view('category.create');
    }
    
    public function store()
    { 
        $input = Request::all();
        
        //saving data
        $book = new AudioCategory();
        $book->category = $input['category'];
        $book->save();
        return redirect('/admin/category');
    }
    
    public function edit($id)
    {
        $data['category'] = AudioCategory::find($id);
        return view('category.edit')->with($data);   
    }
    
    public function updateCategory($id)
    { 
        $input = Request::all();
        
        $book = AudioCategory::find($id);
        $book->category = $input['category'];
        $book->update();
        return redirect('/admin/category');
    }
    
    public function DeleteCategory($id) {
        $result = AudioCategory::find($id);
        $result->delete();
        return redirect('/admin/category');
    }
}
