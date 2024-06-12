<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('units.data_unit');
    }
}
