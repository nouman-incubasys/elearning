<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Audio;

class AudiosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['audio'] = Audio::all();
        return view('audio.index')->with($data);
    }
    
    public function create()
    {
        return view('audio.create');
    }
    
    public function show() {
        $audio['code'] = 200;
        $audio['message'] = Audio::paginate(10);
        return Response::json($audio);
    }
    
    public function edit($id)
    {
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
        
        $extension = $request->file('audio_file')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        $request->file('audio_file')->move($destinationPath, $fileName); // uploading file to given path
        
        //saving data
        $audio = new Audio();
        $audio->title = $input['title'];
        $audio->vocalist = $input['vocalist'];
        $audio->audio_file = $fileName;
        $audio->save();
        return redirect('/audio');
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
//        $audio->audio_file = $fileName;
        $audio->save();
        return redirect('/audio');
    }
    
    public function deleteAudio($id) {
        
        $result = Audio::find($id);
        $result->delete();
        return redirect('/audio');
        
    }
    
    public function api_audio_check($id) {
        
        $result = Audio::find($id);
        return json_encode($result);
        
    }
}
