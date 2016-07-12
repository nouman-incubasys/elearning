<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Bible;
use App\BibleChapter;
use Illuminate\Support\Facades\Input;

class BibleController extends Controller
{
    public function show() {
        $bible['code'] = 200;
        $bible['message'] = Bible::simplepaginate(10);
        return Response::json($bible);
    }
    
    public function showBooks() {
        $bible['code'] = 200;
        $bible['message'] = BibleChapter::all();
        return Response::json($bible);
    }
    
    public function showChapters() {
        
        $input = Input::all();
        
        if(!isset($input['book']) || empty($input['book'])){
            $data['code'] = 105;
            $data['message'] = 'Insufficient Parameter';
            return Response::json($data); 
        }
        
        $bible['code'] = 200;
        $bible['message'] = Bible::whereB($input['book'])->distinct()->pluck('b','c');
        return Response::json($bible);
    }
    
    public function showVerses() {
        
        $input = Input::all();
        
        if(!isset($input['book']) || empty($input['book'])){
            $data['code'] = 105;
            $data['message'] = 'Insufficient Parameter';
            return Response::json($data); 
        }
        
        $bible['code'] = 200;
        $bible['message'] = Bible::whereB($input['book'])->wherec($input['chapter'])->pluck('c','t');
        return Response::json($bible);
    }
    
    public function searchBible() {
        
        $input = Input::all();
        
        if(!isset($input['verse']) || empty($input['verse']) || empty($input['chapter']) || empty($input['book'])){
            $data['code'] = 105;
            $data['message'] = 'Insufficient Parameter';
            return Response::json($data); 
        }
        $bible['code'] = 200;
        $bible['message'] = Bible::whereB($input['book'])->wherec($input['chapter'])->where('t', 'like', '%'.$input['verse'].'%')->simplepaginate(5);
        
        if(empty($bible['message'])){
            $bible['code'] = 104;
            $bible['message'] = 'No Verse Found';
        }
        
        return Response::json($bible);
    }
}
