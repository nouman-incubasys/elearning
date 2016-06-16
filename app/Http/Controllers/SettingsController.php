<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use App\Setting;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['settings'] = Setting::all();
        return view('settings.index')->with($data);
    }
    
    public function create()
    {
        return view('settings.create');
    }
    
    public function edit($id)
    {
        $data['settings'] = Setting::find($id);
        return view('settings.edit')->with($data);
    }
    
    public function store()
    { 
        $input = Request::all();

        //saving data
        $setting = new Setting();
        $setting->type = $input['type'];
        $setting->channel_id = $input['channel'];
        $setting->save();
        return redirect('/settings');
    }
    
    public function updateSettings($id)
    { 
        $input = Request::all();

        //saving data
        $setting = Setting::find($id);
        $setting->type = $input['type'];
        $setting->channel_id = $input['channel'];
        $setting->save();
        return redirect('/settings');
    }
    
    public function DeleteSetting($id) {
        $result = Setting::find($id);
        $result->delete();
        return redirect('/settings');
    }
}
