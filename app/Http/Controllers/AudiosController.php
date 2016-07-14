<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Audio;
use App\AudioCategory;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class AudiosController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['audio'] = Audio::all();
        return view('audio.index')->with($data);
    }
    
    public function create()
    {
        $data['category'] = AudioCategory::all();
        return view('audio.create')->with($data);
    }
    
    public function show() {
        $audio['code'] = 200;
        $audio['message'] = Audio::paginate(10);
        if($audio['message'])
            return Response::json($audio);
    }
    
    public function showbyCategory() {
        $input = Input::all();
        
        if(!isset($input['category']) || empty($input['category'])){
            $cat['code'] = 105;
            $cat['message'] = "InSufficient Parameters";
            return Response::json($cat);
        }
        
        $result = AudioCategory::whereCategory($input['category'])->first();
        $cat['code'] = 200;
        $cat['message'] = Audio::whereCategory_id($result['id'])->get();
        
        return Response::json($cat);
    }
    
    public function showbyCategoryId() {
        $input = Input::all();
        
        if(!isset($input['category']) || empty($input['category'])){
            $cat['code'] = 105;
            $cat['message'] = "InSufficient Parameters";
            return Response::json($cat);
        }
        $cat['code'] = 200;
        $cat['message'] = Audio::whereCategory_id($input['category'])->get();
        
        return Response::json($cat);
    }
    
    public function edit($id)
    {
        $data['category'] = AudioCategory::all();
        $data['audio'] = Audio::find($id);
        return view('audio.edit')->with($data);
    }
    
    public function store(Request $request)
    { 
        $input = $request->input();
//      
//
//        if ($validator->fails()) {
//            return redirect('post/create')
//                        ->withErrors($validator)
//                        ->withInput();
//        }
        
        $destinationPath = 'uploads/audio'; // upload path
        
        $extension1 = $request->file('album_art')->getClientOriginalExtension(); // getting image extension
        $fileName1 = rand(11111,99999).'.'.$extension1; // renameing image
        $request->file('album_art')->move($destinationPath, $fileName1); // uploading file to given path
        
        $extension = $request->file('audio_file')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        $request->file('audio_file')->move($destinationPath, $fileName); // uploading file to given path
        
        //saving data
        $audio = new Audio();
        $audio->title = $input['title'];
        $audio->vocalist = $input['vocalist'];
        $audio->category_id = $input['category'];
        $audio->album_art = URL::to('/uploads/audio').'/'. $fileName1;
        $audio->audio_file = URL::to('/uploads/audio').'/'. $fileName;
        $audio->save();
        return redirect('/admin/audio');
    }
    
    public function updateAudio($id)
    { 
        $input = Input::all();
        
//        $this->validate($request, [
//            'file' => 'required|mimes:mpga',
//            'file' => 'required|mimes:wav'
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('post/create')
//                        ->withErrors($validator)
//                        ->withInput();
//        }
        
//        $destinationPath = 'uploads/audio'; // upload path
//        
//        $extension = Request::file('audio_file')->getClientOriginalExtension(); // getting image extension
//        $fileName = rand(11111,99999).'.'.$extension; // renameing image
//        Request::file('audio_file')->move($destinationPath, $fileName); // uploading file to given path
        
        //saving data
        $audio = Audio::find($id);
        $audio->title = $input['title'];
        $audio->vocalist = $input['vocalist'];
        $audio->category_id = $input['category'];
//        $audio->audio_file = $fileName;
        $audio->save();
        return redirect('/admin/audio');
    }
    
    public function deleteAudio($id) {
        
        $result = Audio::find($id);
        $result->delete();
        return redirect('/admin/audio');
        
    }
    
    public function api_audio_check($id) {
        
        $result = Audio::find($id);
        return json_encode($result);
        
    }
}
