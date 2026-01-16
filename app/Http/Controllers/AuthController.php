<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login.index');
    }

    public function register()
    {
        return view('auth.register.index');
    }

    public function authenticate(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email','=',$request->email)->first();
        if (Auth::attempt($credetials)) {
            $request->session()->put('loginId', $user->id);
            return redirect('/nisn')->with('success', 'Login berhasil');
        }


        return back()->with('error', 'Email or Password salah');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return redirect()->intended('/login');
        }
    }

}
