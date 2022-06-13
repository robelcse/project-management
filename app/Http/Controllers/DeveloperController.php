<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{

    protected $user;
    /**
     * constructor method
     * 
     * create instance of user controller
     */
    public function __construct(UserController $user)
    {
        $this->user = $user;
    }
    /**
     * Get list of developer
     * 
     * @return Array of Object
     */
    public function getAllDeveloper()
    {
        $developers = Developer::orderBy('developer_id', 'desc')->where('user_id',Auth::user()->user_id)->get();
        return view('Developer.index', compact('developers'));
    }

    /**
     * View page for create developer
     * 
     * @return \Illuminate\Http\View
     */
    public function createDeveloper()
    {
        return view('Developer.create');
    }

    /**
     * Store developer information
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     */
    public function storeDeveloper(Request $request)
    {

        $request->validate([
            'first_name'           => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email|unique:developers',
            'skills'               => 'required',
        ]);


        //client role
        $role = 2;
        $developer = Developer::create($request->all());
        $this->user->store($request, $role);
        return redirect()->route('developer.index')->with('success', 'Developer created successfully');
    }

    /**
     * Show developer information for edit
     * 
     * @param int $id
     * 
     * @return Object of developer
     */
    public function editDeveloper($id)
    {
        $developer = Developer::where('developer_id', $id)->first();
        return view('Developer.edit', compact('developer'));
    }

    /**
     * Update the developer information
     * 
     * @param \Illuminate\Http\Request
     * @param int $id
     * 
     * @return Boolean
     */
    public function updateDeveloper(Request $request, $id)
    {

        $request->validate([
            'first_name'           => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email|unique:developers',
            'skills'               => 'required',
        ]);


        $developer = Developer::where('developer_id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('developer.index')->with('success', 'Developer updated successfully');
    }

    /**
     * Remove the specific developer from storage
     * 
     * @param int $id
     * 
     *@return Boolean
     */
    public function deleteDeveloper($id)
    {
        $developer = Developer::where('developer_id', $id)->delete();
        return redirect()->route('developer.index')->with('success', 'Developer deleted successfully');
    }
}
