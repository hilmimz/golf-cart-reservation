<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;

class KelolaSopirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/kelola_sopir');
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
    public function show(UsersModel $usersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersModel $usersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersModel $usersModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersModel $usersModel)
    {
        //
    }
}
