<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use App\Models\ReservationsModel;
use App\Models\RoutesModel;
use App\Models\SchedulesModel;
use App\Models\ScheduleTimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservasiController extends Controller
{
    public function index(Request $request){
        // dd($this->seat_left(196, 198, 2));
        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
            'golf_cart_id' => 'required'
        ]);
        $routes=RoutesModel::all();
        $golf_carts=GolfCartsModel::all();
        $start = $request->input('start');
        $end = $request->input('end');
        $golf_cart_id = $request->input('golf_cart_id');
        $now = Carbon::now();
        $now = $now->format('H:i');
        // dd($now);

        $schedule_time_id = ScheduleTimeModel::where('golf_cart_id', $golf_cart_id)->pluck('id')->first();
        $schedule = SchedulesModel::all();
        $sortedSchedules = $schedule->sort(function ($a, $b) {
            $timeA = Carbon::parse($a->time)->format('H:i');
            $timeB = Carbon::parse($b->time)->format('H:i');
        
            return $timeA <=> $timeB;
        });
        $sortedSchedules = $sortedSchedules->where('schedule_time_id', $schedule_time_id);

        $results = $this->findSchedule($start, $end, $sortedSchedules, $golf_cart_id);
        // dd($results);
        $route_start = RoutesModel::find($start);
        $route_end = RoutesModel::find($end);
        $golf_cart = GolfCartsModel::where('id',$golf_cart_id)->pluck('name');
        // dd($golf_cart[0]);
        $golf_cart_name = $golf_cart[0];
        return view('user.reservasi', compact(['results','route_start','route_end','golf_cart','golf_cart_name','now', 'routes', 'golf_carts']));
    }

    public function findSchedule($start, $end, $schedules, $golf_cart_id){
        $result = [];
        $inRange = false;
        $currentGroup = [];
        $lastKey = $schedules->count()-1;
        
        foreach ($schedules as $key => $item) {
            if ($item->route_start == $start) {
                $inRange = true;
                $currentGroup = [
                    'start_id' => $item->id,
                    'route_start' => $item->route_start,
                    'start_time' => $item->time,
                    'end_id' => null,
                    'route_end' => $end,
                    'end_time' => null,
                    'golf_cart_id' => $golf_cart_id
                ];
                // foreach ($schedules as $k => $v) {
                //     if ($k < $key) continue;
                //         if ($v->route_start == $end) {
                //             $currentGroup['end_id'] = $v->id;
                //         }
                //  }
            } elseif ($item->route_start == $end && $inRange) {
                $inRange = false;
                $currentGroup['end_id'] = $item->id;
                $currentGroup['end_time'] = $item->time;
                $seat = $this->seat_left($currentGroup['start_id'], $currentGroup['end_id'], $currentGroup['golf_cart_id']);
                $currentGroup['seat_left'] = $seat;
                $result[] = $currentGroup;
            }
        }

        return $result;
    }

    public function reservation(Request $request, ReservationsModel $reservationsModel){
        $valid = $this->validate($request, [
            'route_start' => 'required',
            'route_end' => 'required',
            'golf_cart_id' => 'required'
        ]);
        // dd($valid);
        // dd($request->route_end);
        $token = Str::random(6);
        while ($token == $reservationsModel->where('token', $token)->pluck('token')) {
            $token = Str::random(6);
        }

        $id = DB::table('RESERVATIONS')->insertGetId([
            'ROUTE_START' => $request->route_start,
            'ROUTE_END' => $request->route_end,
            'PASSENGER_ID' => auth()->user()->id,
            'DATE' => Carbon::now(),
            'TOKEN' => $token,
            'STATUS' => 1,
            'GOLF_CART_ID' => $request->golf_cart_id
        ]);

        return redirect()->route('dashboard_user')->with(['success' => 'Reservasi berhasil dengan kode '.$token.'. Cek riwayat untuk melihat reservasi yang aktif']);;
    }

    public function seat_left($route_start, $route_end, $golf_cart_id){
        $pdo = DB::connection('oracle')->getPdo();
        $stmt = $pdo->prepare("BEGIN :result := seat_left(:routeStart, :routeEnd, :golfCartId); END;");
        $stmt->bindParam(':routeStart', $route_start, \PDO::PARAM_INT);
        $stmt->bindParam(':routeEnd', $route_end, \PDO::PARAM_INT);
        $stmt->bindParam(':golfCartId', $golf_cart_id, \PDO::PARAM_INT);
        $stmt->bindParam(':result', $result, \PDO::PARAM_INT, 32); // Assuming 32 is the maximum size of the returned value
    
        $stmt->execute();
    
        return $result;
    } 
}
