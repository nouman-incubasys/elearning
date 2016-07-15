<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Instagram_setting;

class InstaController extends Controller
{
    public function index()
    {
        $data['instagram'] = Instagram_setting::all();
        return view('instagram.index')->with($data);
    }
    
    public function create()
    {
        return view('instagram.create');
    }
    
    public function edit($id)
    {
        $data['instagram'] = Instagram_setting::find($id);
        return view('instagram.edit')->with($data);
    }
    
    public function store()
    { 
        $input = Request::all();

        //saving data
        $setting = new Instagram_setting();
        $setting->account_name = $input['account_name'];
        $setting->client_id = $input['client_id'];
        $setting->client_secret = $input['client_secret'];
        $setting->save();
        
        return redirect('/admin/instagram');
    }
    
    public function updateSettings($id)
    { 
        $input = Request::all();

        //saving data
        $setting = Instagram_setting::find($id);
        $setting->account_name = $input['account_name'];
        $setting->client_id = $input['client_id'];
        $setting->client_secret = $input['client_secret'];
        $setting->save();
        return redirect('/admin/instagram');
    }
    
    public function DeleteSetting($id) {
        $result = Instagram_setting::find($id);
        $result->delete();
        return redirect('/admin/instagram');
    }
    
    public function getResponse() {
        dd(Request::all());
    }
}
