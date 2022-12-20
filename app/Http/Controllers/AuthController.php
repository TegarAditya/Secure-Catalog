<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //make method login and register with request
    public function login()
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
