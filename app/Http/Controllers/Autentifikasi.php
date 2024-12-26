<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Autentifikasi extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function buatUser(Request $request)
    {

        $check = User::where('username', $request->username)->first();

        if ($check) {
            return redirect()->back()->with('message', 'Username sudah digunakan');
        }

        $user = new User;
        $user->name = $request->namalengkap;
        $user->nim = $request->nim;
        $user->jurusan = $request->jurusan;
        $user->angkatan = $request->angkatan;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'mahasiswa';
        $user->save();

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }

    public function login()
    {
        return view('login');
    }

    public function editprofile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->namalengkap;
        $user->nim = Auth::user()->nim;
        $user->jurusan = $request->jurusan;
        $user->angkatan = $request->angkatan;
        $user->username = Auth::user()->username;
        $user->email = $request->email; 
        $user->password = bcrypt($request->password);
        $user->role = Auth::user()->role;
        $user->save();

        return redirect()->route('dashboard');
    }

    public function prosesLogin(Request $request)
    {
        $data = $request->only('username', 'password');

        $user = User::where('username', $data['username'])->first();

        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('message', 'Password salah');
            }
        } else {
            return redirect()->back()->with('message', 'Username tidak ditemukan');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
