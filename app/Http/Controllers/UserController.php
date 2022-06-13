<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store user information
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     */
    public function store(Request $request, $role)
    {
        if ($role == 2) {
            //store developer
            $this->storeDev($request, $role);
        } elseif ($role == 3) {
            //store client
            $this->storeClient($request, $role);
        }
    }

    /**
     * Store client information into user table
     * 
     */

    public function storeClient($request, $role)
    {
        $user = new User();
        $user->user_name = $request->first_name . ' ' . $request->last_name;
        $user->user_email = $request->email;
        $user->phone = null;
        $user->address = null;
        $user->bio = null;
        $user->skills = null;
        $user->role = $role;
        $user->password = Hash::make($request->email);
        $user->save();
    }

    /**
     * Store client information into user table
     * 
     */

    public function storeDev($request, $role)
    {
        $user = new User();
        $user->user_name = $request->first_name . ' ' . $request->last_name;
        $user->user_email = $request->email;
        $user->phone = null;
        $user->address = null;
        $user->bio = null;
        $user->skills = $request->skills;
        $user->role = $role;
        $user->password = Hash::make($request->email);
        $user->save();
    }
}
