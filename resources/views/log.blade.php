@extends('layout')

@section('content')

<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th, .custom-table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .custom-table th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
    }

    .custom-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .custom-table tr:hover {
        background-color: #f1f1f1;
    }

    .custom-header {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .custom-container {
        max-width: 90%;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .custom-container.dark {
        background-color: #333;
        color: #fff;
    }

    .custom-container.dark .custom-table th {
        background-color: #555;
        color: #fff;
    }

    .custom-container.dark .custom-table td {
        color: #ddd;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="custom-container {{ app()->getLocale() === 'dark' ? 'dark' : '' }}">
            <div class="p-6">
                <div class="mb-4">
                    <h1 class="custom-header">Activity Log</h1>
                </div>
                <div class="overflow-x-auto">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Timestamp
                                </th>
                                <th scope="col">
                                    Log Entry
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>
                                    {{ $log->created_at }}
                                </td>
                                <td>
                                    {{ $log->log_entry }}
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
