<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
     * Get the list of client
     * 
     * @return Array of Object
     */
    public function getAllClient()
    {
        $clients = Client::orderBy('client_id', 'desc')->where('user_id',Auth::user()->user_id)->get();
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
            'email'                => 'required|email|unique:clients',
            'company'              => 'required',
            'company_website'      => 'required',
            'gender'               => 'required|not_in:0',
        ]);

        //client role
        $role = 3;
        $client = Client::create($request->all());
        $this->user->store($request, $role);
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
            'email'                => 'required|email|unique:clients',
            'company'              => 'required',
            'company_website'      => 'required',
            'gender'               => 'required|not_in:0',
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
