<?php

namespace App\Http\Controllers;

use App\Models\RoutesModel;
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
    public function update(Request $request, RoutesModel $routesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoutesModel $routesModel)
    {
        //
    }
}
