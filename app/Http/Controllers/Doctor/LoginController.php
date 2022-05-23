<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('doctor.login');
    }

    public function processLogin(LoginRequest $request)
    {
        $credentials = $request->except(['_token']);
        $doctor = Doctor::where('email', $request->email)->first();
        if ($doctor) {
            if (Hash::check($request->password, $doctor->password)) {
                if (Auth::guard('doctor')->attempt($credentials)) {
                    return redirect('/doctorHome');
                }
                return redirect('/doctorLogin')->with('message', 'Credentials not matced in our records!');
            }
        }

        return redirect('/doctorLogin')->with('message', 'You are not an active doctors!');
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/doctorLogin');
    }

    public function home()
    {
        return view('doctor.home');
    }
}