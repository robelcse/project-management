<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Get the list of client
     * 
     * @return Array of Object
     */
    public function getAllClient()
    {
        $clients = Client::orderBy('client_id', 'desc')->get();
        return view('Client.index', compact('clients'));
    }

    /**
     * View page to create client
     * 
     * @return \Illuminate\Http\View
     */
    public function createClient()
    {
        return view('Client.create');
    }

    /**
     * Store client information
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     */
    public function storeClient(Request $request)
    {

        $request->validate([
            'first_name'           => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email',
            'company'              => 'required',
            'company_website'      => 'required',
            'connect_by'           => 'required',
            'social_profile'       => 'required',
            'communication_medium' => 'required',
            'communication_link'   => 'required',
            'date_of_birth'        => 'required',
            'gender'               => 'required',
        ]);

        $client = Client::create($request->all());
        return redirect()->route('client.index')->with('success', 'Client created successfully.');
    }

    /**
     * Show client informmation for edit
     * 
     * @param  int  $id
     * 
     * @return Object of client
     */
    public function editClient(Request $request, $id)
    {
        $client = Client::where('client_id', $id)->first();
        return view('Client.edit', compact('client'));
    }


    /**
     * Show client informmation for view
     * 
     * @param  int  $id
     * 
     * @return Object of client
     */
    public function showClient($id)
    {
        $client = Client::with('projects')->where('client_id', $id)->first();
        return view('Client.show', compact('client'));
    }

    /**
     * Update the client information
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     * @return Boolean
     */
    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'first_name'           => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email',
            'company'              => 'required',
            'company_website'      => 'required',
            'connect_by'           => 'required',
            'social_profile'       => 'required',
            'communication_medium' => 'required',
            'communication_link'   => 'required',
            'date_of_birth'        => 'required',
            'gender'               => 'required',
        ]);
        $client =  Client::where('client_id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  int  $id
     * 
     * @return Boolean
     */
    public function deleteClient($id)
    {
        $client = Client::where('client_id', $id)->delete();
        return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
    }
}
