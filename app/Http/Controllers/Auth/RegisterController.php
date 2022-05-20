<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * 
     * show register page for user regisre
     * 
     * @return \Illuminate\View
     * 
     */
    public function showRegisterPage()
    {

        return view('auth.register');
    }

    /**
     * 
     * user registraion process
     * 
     * @param  \Illuminate\Http\Request
     * 
     * @return reidrect dashboard
     * 
     */
    public function register(Request $request)
    {

        $regsiter_credential =  $request->validate([

            'name' => 'required',
            'user_email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User();
        $user->user_name = $request->name;
        $user->user_email = $request->user_email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success','Registration successfull.');
    }
}
