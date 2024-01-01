<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaSopirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sopiraktifs=UsersModel::where('type', 2)->where('status', true)->get();
        $sopirinaktifs=UsersModel::where('type', 2)->where('status', false)->get();
        return view('admin/kelola_sopir', compact(['sopiraktifs', 'sopirinaktifs']));
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
    public function destroy(UsersModel $usersModel, $id)
    {
        $usersModel::find($id)->delete();
        return redirect()->route('sopir.index')->with(['success' => 'Sopir Berhasil Dihapus!']);
    }
    public function validasi(Request $request, $id)
    {
        $sopir=UsersModel::where('id', $id);
        // DB::table('users')->where 
        $sopir->update([
            'status'=>true
        ]);
        return redirect()->route('sopir.index')->with(['success' => 'Sopir Berhasil Divalidasi!']);
    }
    public function nonaktif($id)
    {
        $sopir=UsersModel::where('id', $id);
        // DB::table('users')->where 
        $sopir->update([
            'status'=>false
        ]);
        return redirect()->route('sopir.index')->with(['success' => 'Sopir Berhasil Dinonaktifkan!']);
    }
}
