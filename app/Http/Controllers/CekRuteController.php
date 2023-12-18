<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekRuteController extends Controller
{
    public function index(){
        return view('user.cek_rute');
    }
}
