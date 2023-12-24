<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use App\Models\RoutesModel;
use App\Models\SchedulesModel;
use App\Models\ScheduleTimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
            'golf_cart_id' => 'required'
        ]);
        $start = $request->input('start');
        $end = $request->input('end');
        $golf_cart_id = $request->input('golf_cart_id');

        $schedule_time_id = ScheduleTimeModel::where('golf_cart_id', $golf_cart_id)->pluck('id')->first();
        $schedule = SchedulesModel::all();
        $sortedSchedules = $schedule->sort(function ($a, $b) {
            $timeA = Carbon::parse($a->time)->format('H:i');
            $timeB = Carbon::parse($b->time)->format('H:i');
        
            return $timeA <=> $timeB;
        });
        $sortedSchedules = $sortedSchedules->where('schedule_time_id', $schedule_time_id);

        $results = $this->findSchedule($start, $end, $sortedSchedules);
        $route_start = RoutesModel::find($start);
        $route_end = RoutesModel::find($end);
        $golf_cart = GolfCartsModel::find($golf_cart_id);
        return view('user.reservasi', compact(['results','route_start','route_end','golf_cart']));
    }

    public function findSchedule($start, $end, $schedules){
        $result = [];
        $inRange = false;
        $currentGroup = [];
        
        foreach ($schedules as $item) {
            if ($item->route_start == $start) {
                $inRange = true;
                $currentGroup = [
                    'route_start' => $item->route_start,
                    'start_time' => $item->time,
                    'route_end' => $end,
                    'end_time' => null,
                ];
            } elseif ($item->route_start == $end && $inRange) {
                $inRange = false;
                $currentGroup['end_time'] = $item->time;
                $result[] = $currentGroup;
            }
        }

        return $result;
    }
}
