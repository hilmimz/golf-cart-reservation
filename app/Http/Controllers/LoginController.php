<?php

namespace App\Http\Controllers;

use App\Models\UserTypesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $types = UserTypesModel::all();
        return view('login.login', [
            'title' => 'Login'
        ], compact('types'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->type == 1){
                return redirect()->intended('/dashboard_user');
            }
            if (Auth::user()->type == 2){
                return redirect()->intended('/dashboard_driver');
            }
            if (Auth::user()->type == 3){
                return redirect()->intended('/dashboard_admin');
            }
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
