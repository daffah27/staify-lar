<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kegiatan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class DashboardController extends Controller
{


    public function index()
    {
        if (Auth::user()->role == 'kemahasiswaan') {
            //proposal
            $countTolak = DB::table('danas')->where('konfirmasi', 'ditolak')->count();
            $countOnRev = DB::table('danas')->where('konfirmasi', 'on-review')->count();
            $countVerif = DB::table('danas')->where('konfirmasi', 'terverifikasi')->count();

            $jumlahData = $countTolak + $countOnRev + $countVerif;

            $persenTolak = $jumlahData ? ($countTolak / $jumlahData) * 100 : 0;
            $persenVerif = $jumlahData ? ($countVerif / $jumlahData) * 100 : 0;
            $persenReview = $jumlahData ? ($countOnRev / $jumlahData) * 100 : 0;


            //kegiatan
            $countKegiatan = DB::table('kegiatans')->count();

            //prestasi
            $countPrestasionRev = DB::table('prestasis')->where('konfirmasi', 'on-review')->count();
            $countPrestasiVerif = DB::table('prestasis')->where('konfirmasi', 'terverifikasi')->count();


            return view('kemahasiswaan.dashboard', compact('countTolak', 'countOnRev', 'countVerif', 'persenTolak', 'persenVerif', 'persenReview', 'countKegiatan', 'countPrestasionRev', 'countPrestasiVerif'));
        } else if (Auth::user()->role == 'mahasiswa') {
            $kegiatans = kegiatan::all();
            return view('mahasiswa.dashboard', compact('kegiatans'));
        } elseif (Auth::user()->role == 'ormawa') {

            $countTolak = DB::table('danas')->where('id_user', Auth::user()->id)->where('konfirmasi', 'ditolak')->count();
            $countOnRev = DB::table('danas')->where('id_user', Auth::user()->id)->where('konfirmasi', 'on-review')->count();
            $countVerif = DB::table('danas')->where('id_user', Auth::user()->id)->where('konfirmasi', 'terverifikasi')->count();

            $jumlahData = $countTolak + $countOnRev + $countVerif;

            $persenTolak = $jumlahData ? ($countTolak / $jumlahData) * 100 : 0;
            $persenVerif = $jumlahData ? ($countVerif / $jumlahData) * 100 : 0;
            $persenReview = $jumlahData ? ($countOnRev / $jumlahData) * 100 : 0;


            $countKegiatan = DB::table('kegiatans')->where('id_user', Auth::user()->id)->count();


            return view('ormawa.dashboard', compact('countTolak', 'countOnRev', 'countVerif', 'persenTolak', 'persenVerif', 'persenReview', 'countKegiatan'));
        }
    }

    public function akunview()
    {
        $akunormawa = User::where('role', 'ormawa')->get();
        $akunmahasiswa = User::where('role', 'mahasiswa')->get();
        return view('kemahasiswaan.akun', compact('akunormawa', 'akunmahasiswa'));
    }

    public function akunreset($id)
    {
        $akun = User::find($id);
        $akun->password = bcrypt($akun->username);
        $akun->save();

        return redirect()->route('akun');
    }

    public function akunstore()
    {
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->username = request('username');
        $user->password = bcrypt(request('password'));
        $user->role = request('role');
        $user->save();


        return redirect()->route('akun')->with('success', 'Akun berhasil dibuat.');
    }

    public function akundestroy($id)
    {
        $akun = User::find($id);
        $akun->delete();

        return redirect()->route('akun');
    }
}
