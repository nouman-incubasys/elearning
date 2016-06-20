<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['user'] = User::all();
        return view('home')->with($data);
    }
    
    public function show()
    {
        die('a');
//        $result = inventorymodel::find(1);
//        return $result;
    }
    
    public function edit($id)
    {
//        $result = inventorymodel::find($id);
//        return view('myedit')->with('olddata',$result);
    }
    public function store(){
        
        $request = Input::all();
        
        $rules = [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required'
        ];
        $validation = Validator::make($request,$rules);
        // TODO
        $user = new User();
        $user->name= $request['name'];
        $user->password= bcrypt($request['password']);
        $user->email= $request['email'];
        $user->address= $request['address'];
        $user->city= $request['city'];
        $user->country= $request['country'];
        $user->phone_number= $request['phone_number'];
        $user->access_token= bcrypt($request['email'].$request['password']);
        $user->save();
        
        $new_user = array();
        $new_user['code'] = 200;
        $new_user['message']['id'] = $user->id;
        $new_user['message']['name'] = $user->name;
        $new_user['message']['email'] = $user->email;
        $new_user['message']['password'] = $user->password;
        $new_user['message']['address'] = $user->address;
        $new_user['message']['city'] = $user->city;
        $new_user['message']['country'] = $user->country;
        $new_user['message']['phone_number'] = $user->phone_number;
        $new_user['message']['access_token'] = $user->access_token;
        
        return Response::json($new_user);
    }
    
    public function login(){
        //TODO
        $request = Input::all();
        
        $rules = [
            'email' => 'email',
            'password' => 'required'
        ];
        
        $validation = Validator::make($request,$rules);
        
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user['code'] = 200;
            $user['message'] = User::whereEmail($request['email'])->first();
            $user['message']['message'] = 'User is Authenticated';
        }
        else{
            $user['message'] = 'User not Authenticated';
        }
        
        return Response::json($user);
        
    }
    
    public function update()
    {
//        $input = Request::all();
//        $store = User::find($input['id']);
//        $store->name= $input['name'];
//        $store->code= $input['code'];
//        $store->quantity= $input['quantity'];
//        $store->update();
//        return redirect('/');
    }
    
    public function destroy($id)
    {
//        $result = inventorymodel::find($id);
//        $result->delete();
//        return redirect('/');
        
    }
}
