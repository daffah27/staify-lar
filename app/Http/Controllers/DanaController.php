<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dana;
use Illuminate\Support\Facades\Auth;

class DanaController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'kemahasiswaan'){
            $danas = Dana::all();
            return view('kemahasiswaan.pengajuan', compact('danas'));
        } else if(Auth::user()->role == 'ormawa'){
            $danas = Dana::where('id_user', Auth::user()->id)->get();
            return view('ormawa.pengajuan', compact('danas'));
        }
    }

    public function accept($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->update(['konfirmasi' => 'terverifikasi']);
        return redirect()->route('pengajuan')->with('success', 'Dana diterima.');
    }

    public function reject($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->alasan = request('alasan');
        $dana->update(['konfirmasi' => 'ditolak']);
        return redirect()->route('pengajuan')->with('success', 'Dana ditolak.');
    }

    public function detail($id)
    {
        $dana = Dana::with('user')->findOrFail($id);
        return view('kemahasiswaan.pengajuandet', compact('dana'));
    }

    public function create()
    {
        return view('ormawa.pengajuantam');
    }

    public function store(Request $request)
    {
        $dana = new Dana();
        $dana->id_user = Auth::user()->id;
        $dana->nama_kegiatan = $request->nama_kegiatan;
        $dana->jenis_kegiatan = $request->jenis_kegiatan;
        $dana->tempat = $request->tempat;
        $dana->deskripsi = $request->deskripsi;
        $dana->tanggal_mulai = $request->tanggal_mulai;
        $dana->tanggal_selesai = $request->tanggal_selesai;
        $dana->nominal = $request->nominal;
        $dana->konfirmasi = 'on-review';
        $dana->file_proposal = $request->file_proposal->store('proposal');
        $dana->save();
        return redirect()->route('pengajuan')->with('success', 'Dana berhasil diajukan.');
    }
}
