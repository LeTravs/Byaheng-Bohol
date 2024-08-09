<?php

namespace App\Http\Controllers;

use App\Events\Userlog;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Exports\ClientDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;


class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('created_at','desc')->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_client'), code: 403);

        return view('clients.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('create_client'), code: 403);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
        ]);

        $client = Client::create($validated);
        
        $log_entry = 'Added a new client '. $client->first_name . ' with the ID of '. $client->id;
        event(new Userlog($log_entry));

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('update_client'), code: 403);

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        abort_if(Gate::denies('update_client'), code: 403);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
        ]);

        $client->update($validated);
        
        $log_entry = 'Updated the client '. $client->first_name . ' with the ID of '. $client->id;
        event(new Userlog($log_entry));

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('delete_client'), code: 403);


        $client->delete();

        $log_entry = 'Deleted the client '. $client->first_name . ' with the ID of '. $client->id;
        event(new Userlog($log_entry));

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }

    public function exportExcel() {
        return Excel::download(new ClientDataExport, 'clients-data.xlsx');
    }
}
