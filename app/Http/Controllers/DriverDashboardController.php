<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverDashboardController extends Controller
{
    public function index(){
        return view('sopir.dashboard_sopir');
    }
}
