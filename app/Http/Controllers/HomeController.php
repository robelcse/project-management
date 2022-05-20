<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Admin dashboard
     * 
     * @return \Illuminate\Http\View
     */

    public function dashboard()
    {
        return view('dashboard');
    }
}
