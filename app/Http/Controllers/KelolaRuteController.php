<?php

namespace App\Http\Controllers;

use App\Models\SchedulesModel;
use Illuminate\Http\Request;

class KelolaRuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/kelola_rute');
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
        //
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
    public function update(Request $request, SchedulesModel $schedulesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchedulesModel $schedulesModel)
    {
        //
    }
}
