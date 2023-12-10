<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekJadwalController extends Controller
{
    public function index(){
        return view('user.cek_jadwal');
    }
}
