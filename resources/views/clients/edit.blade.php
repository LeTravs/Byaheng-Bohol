@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $client->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $client->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
        </div>
        <div class="update-btn">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background: #f7f7f7; 
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333; 
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #555; 
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        font-size: 14px;
    }

    .btn-primary {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff; 
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3; 
    }

    .update-btn {
        text-align: center;
    }
</style>

@endsection
