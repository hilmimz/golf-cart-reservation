<?php

namespace App\Http\Controllers;

use App\Models\RoutesModel;
use Illuminate\Http\Request;

class CekRuteController extends Controller
{
    public function index(){
        $routes = RoutesModel::all()->sortBy('order');
        $count = $routes->count();
        return view('user.cek_rute', compact(['routes','count']));
    }
}
