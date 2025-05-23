<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function reqAuth()
    {
        return view('errors.auth', [
            'active' => 'req-auth',
            'title' => 'req-auth'
        ]);
    }

    public function login()
    {
        return view('auth.login', [
            'active' => 'login',
            'title' => 'Login'
        ]);
    }

    public function signup()
    {
        return view('auth.signup', [
            'active' => 'signup',
            'title' => 'Daftar'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = null;
        if (filter_var($request->input('username_or_email'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->input('username_or_email'))->first();
        } else {
            $user = User::where('username', $request->input('username_or_email'))->first();
        }

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                Auth::login($user);
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            } else {
                return back()->withErrors([
                    'password' => 'Password tidak valid.',
                ])->withInput();
            }
        } else {
            return back()->withErrors([
                'username_or_email' => 'Username atau Email tidak ditemukan.',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        // Simpan URL halaman terakhir diakses sebelum logout
        $lastUrl = url()->previous();
        $title = 'Apakah Anda ingin Logout!';
        $text = "Pastikan semua progress sudah tersimpan!";
        // confirmDelete($title, $text); sweet alert confirm logout lakukan di front end aja

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman terakhir yang diakses
        return redirect($lastUrl)->with('success', 'Anda telah berhasil keluar.');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}