<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function about(){
        return view('about');
    }
    public function services(){
        return view('services');
    }
    public function contact(){
        return view('contact');
    }
}
