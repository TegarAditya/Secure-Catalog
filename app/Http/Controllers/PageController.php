<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //make index function
    public function indexadmin()
    {
        //return view dashboard
        return view('dashboard');
    }
    
    public function indexuser()
    {
        //return view dashboard
        return view('dashboard');
    }

    public function indexsuperadmin()
    {
        //return view dashboard
        return view('dashboard');
    }
}
