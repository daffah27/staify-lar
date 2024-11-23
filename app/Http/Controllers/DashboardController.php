<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'kemahasiswaan') {
            //proposal
            $countTolak = DB::table('danas')->where('konfirmasi', 'rejected')->count();
            $countOnRev = DB::table('danas')->where('konfirmasi', 'pending')->count();
            $countVerif = DB::table('danas')->where('konfirmasi', 'accepted')->count();

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
            return view('ormawa.dashboard');
        }
    }
}
