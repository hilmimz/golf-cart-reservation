<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use Illuminate\Http\Request;

class KelolaGolfCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
            return view('admin.kelola_golfcart');
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
    public function show(GolfCartsModel $golfCartsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GolfCartsModel $golfCartsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GolfCartsModel $golfCartsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GolfCartsModel $golfCartsModel)
    {
        //
    }
}
