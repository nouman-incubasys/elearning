<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use App\Banner;


class BannerController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::all();
        return view('banner.index')->with($data);
    }
    
    public function create()
    {
        return view('banner.create');
    }
    
    public function show() {
        $banner['code'] = 200;
        $banner['message'] = Banner::paginate(10);
        if($banner['message'])
        return Response::json($banner);
    }
    
    public function edit($id)
    {
        $data['banner'] = Banner::find($id);
        return view('banner.edit')->with($data);
    }
    
    public function store(Request $request)
    { 
        $input = Request::all();
        
        $destinationPath = 'uploads/banner'; // upload path
        
        $extension = Request::file('banner_image')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        Request::file('banner_image')->move($destinationPath, $fileName); // uploading file to given path
        
        //saving data
        $banner = new Banner();
        $banner->image = $fileName;
        $banner->link = URL::to('/uploads/banner').'/'. $fileName;
        $banner->save();
        return redirect('/admin/banner');
    }
    
    public function updateBanner($id)
    { 
        $input = Input::all();
        
        //saving data
        $banner = Banner::find($id);
        $banner->image = $input['banner_image'];
        $banner->link = URL::to('/uploads/banner').'/'. $input['banner_image'];
        
//        $audio->audio_file = $fileName;
        $banner->save();
        return redirect('/admin/banner');
    }
    
    public function deleteBanner($id) {
        
        $result = Banner::find($id);
        $result->delete();
        return redirect('/admin/banner');
        
    }
}
