<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Get list of developer
     * 
     * @return Array of Object
     */
    public function getAllDeveloper()
    {
        $developers = Developer::orderBy('developer_id', 'desc')->get();
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
            'email'                => 'required|email',
            'social_profile'       => 'required',
            'market_place_profile' => 'required',
            'date_of_birth'        => 'required',
            'skills'               => 'required',
            'gender'               => 'required',
            'communication_medium' => 'required',
        ]);

        $developer = Developer::create($request->all());
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
            'email'                => 'required|email',
            'social_profile'       => 'required',
            'market_place_profile' => 'required',
            'date_of_birth'        => 'required',
            'skills'               => 'required',
            'gender'               => 'required',
            'communication_medium' => 'required',
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
