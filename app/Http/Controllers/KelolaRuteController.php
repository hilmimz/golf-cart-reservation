<?php

namespace App\Http\Controllers;

use App\Models\RoutesModel;
use App\Models\SchedulesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaRuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = RoutesModel::all()->sortBy('order');
        return view('admin/kelola_rute', compact('routes'));
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
            'name' => 'required',
            'order' => 'required',
            'time_to_next_stop' => 'required'
        ]);
        $isExist = RoutesModel::where('order',$request->order)->exists();
        if ($isExist) {
            return redirect()->route('rute.index');
        }

        DB::table('ROUTES')->insert([
            'NAME' =>$request->name,
            'ORDER' => $request->order,
            'TIME_TO_NEXT_STOP' => $request->time_to_next_stop
        ]);

        return redirect()->route('rute.index')->with(['success' => 'Rute Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SchedulesModel $schedulesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchedulesModel $schedulesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoutesModel $routesModel, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'order' => 'required',
            'time_to_next_stop' => 'required'
        ]);
        $isExist = RoutesModel::where('order',$request->order)->exists();
        if ($isExist) {
            $route1 = RoutesModel::where('order',$request->order)->first();
            $route2 = RoutesModel::where('id',$id)->first();
            if ($route1 != $route2) {
                return redirect()->route('rute.index');
            }
        }
        $route = RoutesModel::find($id);

        DB::table('ROUTES')->where('id',$id)->update([
            'NAME' =>$request->name,
            'ORDER' => $request->order,
            'TIME_TO_NEXT_STOP' => $request->time_to_next_stop
        ]);

        return redirect()->route('rute.index')->with(['success' => 'Rute Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoutesModel $routesModel, $id)
    {
        $routesModel::find($id)->delete();
        return redirect()->route('rute.index')->with(['success' => 'Rute Berhasil dihapus!']);
    }

    public function fixOrder(){
        // Misalkan model Anda disebut "YourModel"
        // dd('accessed');
        $routes = RoutesModel::orderBy('order')->get();

        // Update nilai kolom "order" berdasarkan urutan alfabetis kolom "name"
        foreach ($routes as $index => $route) {
            $route->update(['order' => $index + 1]);
        }
        return redirect()->route('rute.index')->with(['success' => 'Order diperbaiki!']);
    }
}
