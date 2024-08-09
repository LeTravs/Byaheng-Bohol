@extends('layouts.admin')

@section('header')
    Super Admin Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h3>Total Users</h3>
                <p>120</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h3>Active Agencies</h3>
                <p>30</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h3>Pending Approvals</h3>
                <p>10</p>
            </div>
        </div>
    </div>
@endsection
