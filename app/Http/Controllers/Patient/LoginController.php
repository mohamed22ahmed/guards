<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('patient.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->except(['_token']);
        $doctor = User::where('email', $request->email)->first();
        if ($doctor) {
            if (Hash::check($request->password, $doctor->password)) {
                if (Auth::guard('web')->attempt($credentials)) {
                    return redirect('/home');
                }
                return redirect('/login')->with('message', 'Credentials not matced in our records!');
            }
        }

        return redirect('/login')->with('message', 'You are not an active doctors!');
    }

    public function home()
    {
        return view('patient.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}