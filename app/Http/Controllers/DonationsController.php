<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Donation;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class DonationsController extends Controller
{
    public function saveTransaction() {
        
        $input = Input::all();
        // defining rules
        $rules = [
            'access_token' => 'required',
            'paypalResponse' => 'required',
        ];
        
        $validation = Validator::make($input,$rules);
        // check for validation
        if ($validation->fails()) {
            $donation['code'] = 105;
            $donation['message'] = 'Insufficient Parameters';
            return Response::json($donation);
        }
        
        $response = json_decode($input['paypalResponse'])->response;
        $payment = json_decode($input['paypalResponse'])->payment;
        // Getting User data by Access token
        $user = User::whereAccess_token($input['access_token'])->first();
        
        // if user does not exists
        if(empty($user)){
            $donation['code'] = 104;
            $donation['message'] = 'User not Authenticated';
            return Response::json($donation);
        }
        // storing transaction
        $donation_stored = new Donation();
        $donation_stored->amount = $payment->amount;
        $donation_stored->transaction_id = $response->id;
        $donation_stored->user_id = $user['id'];
        $donation_stored->payment_status =  $response->state;
        $donation_stored->save();
        
        $donation = array();
        $donation['code'] = 200;
        $donation['message'] = "Your Transaction is Successfully Saved";
        
        return Response::json($donation);
        
    }
}
