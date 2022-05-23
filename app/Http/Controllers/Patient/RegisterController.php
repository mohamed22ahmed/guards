<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('patient.register');
    }

    public function register(RegisterRequest $request)
    {
        $this->createNew($request);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/home');
        }
        return redirect()->back();
    }

    protected function createNew($request)
    {
        $gender = ($request->gender == -1) ? 1 : $request->gender;

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $gender,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'another_phone' => $request->another_phone,
            'national_id' => $request->national_id,
            'occupation' => $request->occupation,
            'company_name' => $request->company_name,
            'is_insured' => $request->is_insured,
            'insurance_provider' => $request->insurance_provider ?? null
        ]);
    }
}