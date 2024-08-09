@extends('layout')

@section('content')

<div class="landing-main">
    <div class="button-container">
        @can('create_client')
        <div>
            <a href="{{ route('clients.create') }}" class="export-button-excel">Add Client</a>
        </div>
        @endcan
    
        @can('export_client')
        <div style="margin-left: auto;">
            <form action="{{ route('clients.download-excel')}}" method="POST" target="__blank">
                @csrf
                <button class="export-button-excel">
                    Export Excel
                </button>
            </form>
        </div>
        @endcan
    </div>

    <table class="client-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                @can('update_client')
                   <th class="action">Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->email }}</td>
                    @can('update_client')
                    <td class='button1'>
                        <div class="action-buttons">
                            @can('update_client')
                                <a href="{{ route('clients.edit', $client) }}" class="icon-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            @endcan
                            @can('delete_client')
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="icon-button icon-button-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .landing-main {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 1200px;
    }

    .button-container {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .export-button-excel, .icon-button, .icon-button-delete {
        display: inline-block;
        padding: 10px 15px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        border: none;
        cursor: pointer;
    }

    .export-button-excel {
        background-color: #4CAF50; /* Green */
    }

    .export-button-excel:hover {
        background-color: #45a049;
    }

    .icon-button, .icon-button-delete {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px; /* Ensure same width */
        height: 40px; /* Ensure same height */
        padding: 0; /* Remove padding */
        text-align: center; /* Center text */
    }

    .icon-button {
        background-color: #008CBA; 
    }

    .icon-button-delete {
        background-color: #f44336; /* Red */
    }

    .icon-button:hover {
        background-color: #007bb5;
    }

    .icon-button-delete:hover {
        background-color: #da190b;
    }

    .client-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .client-table th, .client-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .client-table th {
        background-color: #f2f2f2;
        text-align: left;
    }

    .client-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .client-table tr:hover {
        background-color: #ddd;
    }

    .client-table .action {
        width: 150px; /* Adjust width for the action buttons column */
    }

    .inline-form {
        display: inline;
    }

    .icon-button svg, .icon-button-delete svg {
        vertical-align: middle; /* Align the SVG icons vertically in the middle */
    }

    .action-buttons {
        display: flex;
        gap: 10px; /* Adjust the space between the buttons as needed */
        align-items: center; /* Center align items */
    }
</style>
@endsection
