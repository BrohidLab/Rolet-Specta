<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view("pages.admin.login");
    }

    public function login(Request $request){
        $request->validate([
            'username'    => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        // LOGIN
        if (Auth::attempt($credentials)) {

            // REGENERATE SESSION
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function register(Request $request) {
        $check = User::where('username', 'specta123')->first();

        if ($check) {
            return "User sudah ada";
        }

        User::create([
            'username' => 'specta123',
            'password' => Hash::make('dev123123'),
        ]);

        return back()->with('error', 'Email atau password salah');
    }
}