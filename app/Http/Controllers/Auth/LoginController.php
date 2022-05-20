<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * 
     * Show login page for user login
     * 
     * @return \Illuminate\View
     * 
     */
    public function showLoginPage()
    {
        return view('auth.login');
    }

    /**
     * 
     * User login
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolen
     * 
     */
    public function login(Request $request)
    {
        $login_credential =  $request->validate([
            'user_email' => 'required|email',
            'password' => 'required'
        ]);



        $user =  User::where('user_email', $request->user_email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'credentials does not match our records!');
        } else {

            $user = User::where('user_email', $request->user_email)->first();
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success','Login success!');
        }
    }

    /**
     * 
     * user logout
     * 
     * @param  @param \Illuminate\Http\Request
     * 
     * @return reidrect login page
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
