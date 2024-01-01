<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use App\Models\RoutesModel;
use App\Models\SchedulesModel;
use App\Models\ScheduleTimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class KelolaJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golf_carts = GolfCartsModel::all();
        $routes = RoutesModel::all();
        $schedules_time = ScheduleTimeModel::all();
        return view('admin/kelola_jadwal', compact(['golf_carts', 'routes', 'schedules_time']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'time_start' => 'required',
            'time_end' => 'required',
            'route_start' => 'required',
            'golf_cart_id' => 'required'
        ]);
        
        $time_start = Carbon::createFromFormat('H:i', $request->time_start);
        $time_end = Carbon::createFromFormat('H:i', $request->time_end);
        $route_start = $request->route_start;
        $golf_cart_id = $request->golf_cart_id;
        $route_order = $this->route_order($route_start);
        $schedule_time_id = DB::table('SCHEDULE_TIME')->insertGetId([
            'START' =>$time_start,
            'END' => $time_end,
            'GOLF_CART_ID' => $golf_cart_id
        ]);
        for ($i=0; $i < 1000; $i++) {
            foreach ($route_order as $route) {
                $route_id = RoutesModel::where('order',$route)->first();
                DB::table('SCHEDULES')->insert([
                    'ROUTE_START' => $route_id->id,
                    'SCHEDULE_TIME_ID' => $schedule_time_id,
                    'TIME' =>$time_start
                ]);
                // SchedulesModel::create([
                //     'TIME' =>$time_start,
                //     'ROUTE_START' => $route_id->id,
                //     'GOLF_CART_ID' => $golf_cart_id
                // ]);
                $time_start = $time_start->addMinutes($route_id->time_to_next_stop); 
            }
            if ($time_start >= $time_end) {
                break;
            }
        }
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(RoutesModel $routesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoutesModel $routesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduleTimeModel $scheduleTimeModel, $id)
    {
        $this->validate($request, [
            'time_start' => 'required',
            'time_end' => 'required',
            'golf_cart_id' => 'required'
        ]);
        $schedule_time = $scheduleTimeModel::find($id);
        $time_start = Carbon::createFromFormat('H:i', $request->time_start);
        $time_end = Carbon::createFromFormat('H:i', $request->time_end);
        $golf_cart_id = $request->golf_cart_id;
        $sortedSchedules = $schedule_time->schedule->sort(function ($a, $b) {
            $timeA = Carbon::parse($a->time)->format('H:i');
            $timeB = Carbon::parse($b->time)->format('H:i');
        
            return $timeA <=> $timeB;
        });
        $firstSchedule = $sortedSchedules->first();
        if (
            $time_start == $schedule_time->start and
            $time_end == $schedule_time->end and
            $golf_cart_id == $schedule_time->golf_cart_id
        ) {
            return redirect()->route('jadwal.index');
        }
        $schedule_time->delete();
        $route_order = $this->route_order($firstSchedule->route_start);
        $schedule_time_id = DB::table('SCHEDULE_TIME')->insertGetId([
            'START' =>$time_start,
            'END' => $time_end,
            'GOLF_CART_ID' => $golf_cart_id
        ]);
        for ($i=0; $i < 1000; $i++) {
            foreach ($route_order as $route) {
                $route_id = RoutesModel::where('order',$route)->first();
                DB::table('SCHEDULES')->insert([
                    'ROUTE_START' => $route_id->id,
                    'SCHEDULE_TIME_ID' => $schedule_time_id,
                    'TIME' =>$time_start
                ]);
                // SchedulesModel::create([
                //     'TIME' =>$time_start,
                //     'ROUTE_START' => $route_id->id,
                //     'GOLF_CART_ID' => $golf_cart_id
                // ]);
                $time_start = $time_start->addMinutes($route_id->time_to_next_stop); 
            }
            if ($time_start >= $time_end) {
                break;
            }
        }
        // $sortedSchedules = $schedule_time->schedule->sort(function ($a, $b) {
        //     $timeA = Carbon::parse($a->time)->format('H:i');
        //     $timeB = Carbon::parse($b->time)->format('H:i');
        
        //     return $timeA <=> $timeB;
        // });
        // $firstSchedule = $sortedSchedules->first();
        // $lastSchedule = $sortedSchedules->last();
        // // dd($firstSchedule);
        // if (
        //     $time_start == $schedule_time->start and
        //     $time_end == $schedule_time->end and
        //     $golf_cart_id == $schedule_time->golf_cart_id
        // ) {
        //     return redirect()->route('jadwal.index');
        // }
        // $schedule_time->update([
        //     'golf_cart_id' => $golf_cart_id
        // ]);

        // //backward start
        // if ($time_start < $schedule_time->start) {
        //     $route_order = $this->route_order($firstSchedule->route_start);
        //     $route_order = array_reverse($route_order);
        //     $startTimeBefore = Carbon::parse($schedule_time->start);
        //     for ($i=0; $i < 1000; $i++) {
        //         foreach ($route_order as $key => $route) {
        //             $route_id = RoutesModel::where('order',$route)->first();
        //             try {
        //                 $next_route_id = RoutesModel::where('order',$route_order[$key+1])->first();
        //             } catch (\Throwable $th) {
        //                 $next_route_id = RoutesModel::where('order',$route_order[0])->first();
        //             }
        //             $startTimeBefore = $startTimeBefore->subMinutes($next_route_id->time_to_next_stop);
        //             if ($startTimeBefore < $time_start) {
        //                 $startTimeBefore = $startTimeBefore->addMinutes($next_route_id->time_to_next_stop);
        //                 break;
        //             }
        //             DB::table('SCHEDULES')->insert([
        //                 'ROUTE_START' => $route_id->id,
        //                 'SCHEDULE_TIME_ID' => $id,
        //                 'TIME' =>$startTimeBefore
        //             ]);
        //             $startTimeBefore = $startTimeBefore->subMinutes($next_route_id->time_to_next_stop);
        //         }
        //         if ($startTimeBefore < $time_start) {
        //             break;
        //         }
        //     }
        //     $schedule_time->update([
        //         'start' => $startTimeBefore
        //     ]);
        //     return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
        // }

        // //forward start
        // if ($time_start   > $schedule_time->start) {
        //     $timeToDelete = $time_start;
        //     Schedule::where(function ($query) use ($timeToDelete) {
        //         $query->whereRaw("EXTRACT(HOUR FROM column_name) < ?", [$timeToDelete->hour])
        //             ->orWhere(function ($query) use ($timeToDelete) {
        //                 $query->whereRaw("EXTRACT(HOUR FROM column_name) = ? AND EXTRACT(MINUTE FROM column_name) < ?", [$timeToDelete->hour, $timeToDelete->minute]);
        //             });
        //     })->delete();
        // }

        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduleTimeModel $scheduleTimeModel, $id)
    {
        $scheduleTimeModel::find($id)->delete();
        return redirect()->route('jadwal.index')->with(['success' => 'Jadwal Berhasil Dihapus!']);
    }

    public function route_order($route_start_id){
        $route_start_order = RoutesModel::find($route_start_id)->order;
        $route_order = RoutesModel::all()->pluck('order')->toArray();
        $route_order = Arr::sort($route_order);

        $startIndex = array_search($route_start_order, $route_order);
        $order = array_merge(array_slice($route_order, $startIndex), array_slice($route_order, 0, $startIndex));

        return $order;
    }

    // public function generate_route_order($route_start_id){
    //     $route_order = [];
    //     $route_start_id = RoutesModel::find($route_start_id);
    //     $routes = RoutesModel::all();
    // }
}
