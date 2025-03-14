<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function about(){
        return view('landing.about');
    }
    public function services(){
        return view('landing.services');
    }
    public function contact(){
        return view('landing.contact');
    }
}
