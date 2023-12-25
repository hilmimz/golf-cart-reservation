<?php

namespace App\Http\Controllers;

use App\Models\ReservationsModel;
use App\Models\RoutesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverDashboardController extends Controller
{
    public function index()
    {
        $routes=RoutesModel::all();
        return view('sopir.dashboard_sopir', compact(['routes']));
    }

    public function validasi(Request $request)
    {
        $this->validate($request, [
            'halte' => 'required',
            'token' => 'required'
        ]);
        $reservation=DB::table('reservations')->where('token', $request->token);
        if ($reservation->exists()) {
            $data=ReservationsModel::where('token', $request->token)->first();
            // $data=ReservationsModel::all();
            $timebefore=Carbon::now();
            $timebefore=$timebefore->subMinutes(5);
            $timebefore=Carbon::parse($timebefore)->format('H:i');
            $timeafter=Carbon::now();
            $timeafter=$timeafter->addMinutes(5);
            $timeafter=Carbon::parse($timeafter)->format('H:i');
            // foreach ($data as $key => $value) {
            //     dd($value);
            // }
            $time=Carbon::parse($data->start->time)->format('H:i');
            if (
                $data->start->route_start==$request->halte and
                $time>=$timebefore and
                $time<=$timeafter
            ) {
                DB::table('reservations')->where('token', $request->token)->update([
                    'status'=>false,
                    'driver_id'=>auth()->user()->id
                ]);
                return redirect()->route('dashboard_driver')->with(['success' => 'Berhasil Divalidasi']);
            } else {
                return redirect()->route('dashboard_driver')->with(['error' => 'Gagal Divalidasi']);
            }
        } else {
            return redirect()->route('dashboard_driver')->with(['error' => 'Gagal Divalidasi']);
        }
        
    }
}
