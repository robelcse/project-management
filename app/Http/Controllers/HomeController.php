<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    /**
     * Admin dashboard
     * 
     * @return \Illuminate\Http\View
     */

    public function dashboard()
    {
        //return Auth::user();
        return view('dashboard');
    }
}
