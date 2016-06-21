<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use App\Dailyprayer;

class DailyPrayerController extends Controller
{
    //
    
    public function __construct() {
//        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['dailyprayer'] = \App\Dailyprayer::all();
        return view('dailyprayers.index')->with($data);
    }
    
    public function create()
    {
        return view('dailyprayers.create');
    }
    
    public function store()
    { 
        $input = Request::all();
        // file upload script
        $destinationPath = 'uploads'; // upload path
        
        $extension = Request::file('prayer_icon')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        Request::file('prayer_icon')->move($destinationPath, $fileName); // uploading file to given path

        //saving data
        $prayer = new Dailyprayer();
        $prayer->prayer = $input['prayer'];
        $prayer->verse = $input['verse'];
        $prayer->prayer_date = $input['prayer_date'];
        $prayer->prayer_icon = $fileName;
        $prayer->reference = $input['reference'];
        $prayer->content = $input['content'];
        $prayer->save();
        return redirect('/dailyprayer');
    }
    
    public function edit($id)
    {
        $data['dailyprayer'] = \App\Dailyprayer::find($id);
        return view('dailyprayers.edit')->with($data); 
    }
    
    public function show() {
        $daily['message'] = Dailyprayer::paginate(10);
        return $daily;
    }
    
    public function updatePrayer($id)
    { 
        $input = Request::all();
        $prayer = \App\Dailyprayer::find($id);
        $prayer->prayer = $input['prayer'];
        $prayer->verse = $input['verse'];
        $prayer->prayer_date = $input['prayer_date'];
        $prayer->reference = $input['reference'];
        $prayer->content = $input['content'];
        $prayer->update();
        return redirect('/dailyprayer');
    }
    
    public function DailyPrayerApi($date) {
        $data['message'] = \App\Dailyprayer::wherePrayer_date($date);
        
        return Response::json($data);
    }
    
    
    public function DeletePrayer($id) {
        $result = \App\Dailyprayer::find($id);
        $result->delete();
        return redirect('/dailyprayer');
    }
}
