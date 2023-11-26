<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestDatabase extends Controller
{
    public function test(){
            $tes = DB::select('select * from TES');
            dd('Connection Success To Oracle Database');
    }
}
