<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportOperatorAdminController extends Controller
{
    public function index()
    {
        return view('transportoperator.index');
    }

    public function createVehicleForm()
    {
        return view('transportoperator.create-vehicle');
    }

    public function storeVehicle(Request $request)
    {
        // Logic to store vehicle
        return redirect()->route('transportoperator.index');
    }
}
