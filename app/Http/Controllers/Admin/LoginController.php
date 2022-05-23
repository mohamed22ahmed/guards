<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->except(['_token']);
        $doctor = Admin::where('email', $request->email)->first();
        if ($doctor) {
            if (Hash::check($request->password, $doctor->password)) {
                if (Auth::guard('admin')->attempt($credentials)) {
                    return redirect('/adminHome');
                }
                return redirect('/adminLogin')->with('message', 'Credentials not matced in our records!');
            }
        }

        return redirect('/adminLogin')->with('message', 'You are not an active doctors!');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/adminLogin');
    }
}