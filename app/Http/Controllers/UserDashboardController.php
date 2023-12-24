<?php

namespace App\Http\Controllers;

use App\Models\GolfCartsModel;
use App\Models\RoutesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $routes = RoutesModel::all()->sortBy('order');
        $golf_carts = GolfCartsModel::all();
        return view('user.dashboard_user',compact(['routes','golf_carts']));
    }
}
