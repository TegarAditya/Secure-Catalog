<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function indexlogin()
    {
        //return view login
        return view('login');
    }
    
    public function indexregister()
    {
        //return view login
        return view('login');
    }
    
    public function login(Request $request)
    {
        //return view login
        return view('login');
    }  
        
    public function register(Request $request)
    {
        //return view register
        return view('register');
    }
}
