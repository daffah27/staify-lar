<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'ormawa') {
            $kegiatans = Kegiatan::where('id_user', Auth::user()->id)->get();
            return view('ormawa.kegiatan', compact('kegiatans'));
        } elseif (Auth::user()->role == 'kemahasiswaan') {
            $kegiatans = Kegiatan::all();
            return view('kemahasiswaan.kegiatan', compact('kegiatans'));
        }
    }

    public function show($id)
    {
        $data = kegiatan::find($id);
        return view('mahasiswa.detailkegiatan', compact('data'));
    }

    public function create()
    {
        return view('kemahasiswaan.kegiatantam');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'status' => 'required|string',
            'jenis_kegiatan' => 'required|string',
            'link_pendaftaran' => 'nullable|url',
            'link_juknis' => 'nullable|url',
            'tempat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'penyelenggara' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpeg,png,pdf|max:10240',
        ]);

        $kegiatan = new Kegiatan();
        $kegiatan->id_user = Auth::user()->id;
        $kegiatan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $kegiatan->status = $validatedData['status'];
        $kegiatan->jenis_kegiatan = $validatedData['jenis_kegiatan'];
        $kegiatan->link_pendaftaran = $validatedData['link_pendaftaran'];
        $kegiatan->link_juknis = $validatedData['link_juknis'];
        $kegiatan->tempat = $validatedData['tempat'];
        $kegiatan->tanggal_mulai = $validatedData['tanggal_mulai'];
        $kegiatan->tanggal_selesai = $validatedData['tanggal_selesai'];
        $kegiatan->deskripsi = $validatedData['deskripsi'];
        $kegiatan->penyelenggara = $validatedData['penyelenggara'];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('posters', 'public');
            $kegiatan->file_kegiatan = $filePath;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan')->with('success', 'Kegiatan berhasil dibuat!');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kemahasiswaan.kegiatanedit', compact('kegiatan'));
    }
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|string|max:255',
            'link_pendaftaran' => 'nullable|url',
            'link_juknis' => 'nullable|url',
            'tempat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'penyelenggara' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:jpeg,png,pdf,docx|max:10240',
        ]);

        $kegiatan->update($validatedData);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('posters', 'public');
            $kegiatan->file_kegiatan = $filePath;
            $kegiatan->save();
        }

        return redirect()->route('kegiatan')->with('success', 'Kegiatan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();
        return redirect()->route('kegiatan');
    }
}
