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
        
        $setting = Instagram_setting::find(1);
        
        $input = Request::all();
        if(!isset($input['code']) || empty($input['code'])){
            
        }
        $code = $input['code'];
        $client_id = $setting['client_id'];
        $client_secret = $setting['client_secret'];
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://api.instagram.com/oauth/access_token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                http_build_query(array('client_id' => $client_id,'grant_type' => 'authorization_code','client_secret' => $client_secret,'code' => $code,'redirect_uri' => url('admin/instagram/response'))));

        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
        $setting->access_token = json_decode($server_output)->access_token;
        $setting->save();
        return redirect('/admin/instagram');
    }
    
    public function getToken() {
        $input = Request::all();
        dd($input);
        
    }
    
    public function getAccessToken(){
        
        $result = Instagram_setting::find($id);
        return Response::json($result['access_token']);
        
    }
    
    public function getInstagramMedia() {
        
            
        $setting = Instagram_setting::find(1);
        $url = 'https://api.instagram.com/v1/users/self/media/recent?access_token='.$setting['access_token'];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
        
//        $data = $server_output->data;
        
        dd($server_output);
        
        return redirect('/admin/instagram');
        
    }
}
