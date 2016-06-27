<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index');
    }
    
    public function getBooks()
    {
        return view('user.books');
    }
    
    public function getLogin()
    {
        return view('user.login');
    }
    
    public function getSignup()
    {
        return view('user.signup');
    }
    
    public function getVideo()
    {
        return view('user.video');
    }
    
    public function getRadio()
    {
        return view('user.audio');
    }
    
    public function getDevotion()
    {
        return view('user.devotion');
    }
    
    public function getDonation()
    {
        return view('user.donation');
    }
    
    public function getLivestream()
    {
        return view('user.livestream');
    }
}
