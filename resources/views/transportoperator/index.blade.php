@extends('layouts.transportoperator')

@section('header')
    DASHBOARD
@endsection

@section('content')
    <div class="breadcrumb" style="margin-bottom: 20px; font-size: 16px; color: #666;">
        Home >
    </div>

    <!-- Statistics Boxes -->
    <div class="stats-container" style="display: flex; gap: 20px;">
        <div class="stat-box" style="flex: 1; padding: 20px; background-color: #758d6b; color: white; text-align: center; font-size: 24px;">
            <div>10</div>
            <div>Vehicles</div>
        </div>
        <div class="stat-box" style="flex: 1; padding: 20px; background-color: #758d6b; color: white; text-align: center; font-size: 24px;">
            <div>20</div>
            <div>Bookings</div>
        </div>
        <div class="stat-box" style="flex: 1; padding: 20px; background-color: #758d6b; color: white; text-align: center; font-size: 24px;">
            <div>30</div>
            <div>Rate & Reviews</div>
        </div>
    </div>
@endsection
