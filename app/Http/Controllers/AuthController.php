<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // ambil data user manual via DB::select
        $users = DB::select('SELECT * FROM users WHERE name = ? LIMIT 1', [$request->name]);

        if ($users && count($users) > 0) {
            $user = $users[0];

            if (Hash::check($request->password, $user->password)) {
                // login pakai Auth facade
                Auth::loginUsingId($user->id);
                return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
            }
        }

        return back()->with('error', 'Name atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
