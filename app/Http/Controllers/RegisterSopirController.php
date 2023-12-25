<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterSopirController extends Controller
{
    public function index()
    {
        return view('register.register_sopir', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'phone' => 'required|min:5|max:255'
        ]);

        $validatedData['type'] = 2;
        $validatedData['status'] = false;
        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::table('USERS')->insert([
            'NAME'=>$validatedData['name'],
            'EMAIL'=>$validatedData['email'],
            'PASSWORD'=>$validatedData['password'],
            'PHONE'=>$validatedData['phone'],
            'TYPE'=>$validatedData['type'],
            'STATUS'=>$validatedData['status']
        ]);

        //User::create($validatedData);

        return redirect('/login')->with('success', 'Register successfull! Please contact Administrator to validate');
    }
}
