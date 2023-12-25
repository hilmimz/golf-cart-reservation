<?php

namespace App\Http\Controllers;

use App\Models\ReservationsModel;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        $reservations = ReservationsModel::where('passenger_id', 1)->get();
        // dd($reservations);
        return view('user.riwayat', compact('reservations'));
    }
}
