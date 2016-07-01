<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Comment;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
class CommentsController extends Controller
{
    public function store()
    { 
        $input = Request::all();
        // file upload script
        $rules = [
            'comment' => 'required',
            'user_id' => 'required'
        ];
        
        $validation = Validator::make($input,$rules);
        
        if ($validation->fails()) {
            $comment['code'] = 105;
            $comment['message'] = 'Insufficient Parameters';
            return Response::json($comment);
        }
        
        //saving data
        $comment['message'] = new Comment();
        $comment['message']->comment = $input['comment'];
        $comment['message']->user_id = $input['user_id'];
        $comment['message']->save();
        $comment['code'] = 200;
        
        return Response::json($comment);
    }
}
