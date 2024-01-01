<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaGolfCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = GolfCartsModel::all();
        return view('admin/kelola_golfcart', compact('carts'));
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
            'max_seat' => 'required | integer',
        ]);

        DB::table('GOLF_CARTS')->insert([
            'NAME' =>$request->name,
            'MAX_SEAT' => $request->max_seat
        ]);

        return redirect()->route('golf_cart.index')->with(['success' => 'Golf Cart Berhasil Ditambahkan!']);
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
    public function update(Request $request, GolfCartsModel $golfCartsModel, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'max_seat' => 'required | integer',
        ]);

        DB::table('GOLF_CARTS')->where('id',$id)->update([
            'NAME' =>$request->name,
            'MAX_SEAT' => $request->max_seat
        ]);

        return redirect()->route('golf_cart.index')->with(['success' => 'Golf Cart Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GolfCartsModel $golfCartsModel, $id)
    {
        $golfCartsModel::find($id)->delete();
        return redirect()->route('golf_cart.index')->with(['success' => 'Golf Cart Berhasil Dihapus!']);
    }
}
