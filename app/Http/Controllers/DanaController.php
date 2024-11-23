<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dana;

class DanaController extends Controller
{
    public function index()
    {
        $danas = Dana::all();
        return view('kemahasiswaan.pengajuan', compact('danas'));
    }

    public function accept($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->update(['konfirmasi' => 'accepted']);
        return redirect()->route('pengajuan')->with('success', 'Dana diterima.');
    }

    public function reject($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->alasan = request('alasan');
        $dana->update(['konfirmasi' => 'rejected']);
        return redirect()->route('pengajuan')->with('success', 'Dana ditolak.');
    }

    public function detail($id)
    {
        $dana = Dana::with('user')->findOrFail($id);
        return view('kemahasiswaan.pengajuandet', compact('dana'));
    }
}
