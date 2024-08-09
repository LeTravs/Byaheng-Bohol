<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourAgencyAdminController extends Controller
{
    public function index()
    {
        return view('touragency.index');
    }

    public function createPackageForm()
    {
        return view('touragency.create-package');
    }

    public function storePackage(Request $request)
    {
        // Logic to store package
        return redirect()->route('tourAgency.index');
    }
}
