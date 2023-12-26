<?php

namespace App\Http\Controllers;

use App\Models\ReservationsModel;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $reservations_selesai = ReservationsModel::where('passenger_id', auth()->user()->id)->where('status', false)->get();
        $reservations_aktif = ReservationsModel::where('passenger_id', auth()->user()->id)->where('status', true)->get();
        // dd($reservations);
        return view('user.riwayat', compact('reservations_selesai','reservations_aktif'));
    }

    public function batal ($id)
    {
        ReservationsModel::find($id)->delete();
        return redirect()->route('riwayat')->with(['success' => 'Pesanan berhasil dibatalkan!']);
    }
}
