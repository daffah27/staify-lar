<?php

namespace App\Http\Controllers;

use App\Models\prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PrestasiController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'kemahasiswaan') {
            $terverifikasi = Prestasi::with('user')
                ->whereIn('konfirmasi', ['terverifikasi', 'ditolak'])
                ->get();

            $onReview = Prestasi::with('user')
                ->where('konfirmasi', 'on-review')
                ->get();

            return view('kemahasiswaan.prestasi', compact('terverifikasi', 'onReview'));
        } elseif (Auth::user()->role == 'mahasiswa') {
            $prestasis = Prestasi::where('id_user', Auth::user()->id)->get();
            return view('mahasiswa.prestasi', compact('prestasis'));
        }
    }

    public function accept($id)
    {
        $prestasi = Prestasi::findOrFail($id);
     
        $prestasi->konfirmasi = 'terverifikasi';
        $prestasi->save();
 
        $response = Http::withHeaders([
            'api-key' => $apikey,
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email',[
            'sender' => [
                'name' => 'Staify ',
                'email' => 'staifylaravel@gmail.com ',
            ],
            'to' => [
                ['email' => $prestasi->user->email,]
            ],
            'subject' => 'Achievment is accepted',
            'htmlContent' => '<html><body><h1>Prestasi diterima</h1></body></html>',
        ]);

        return redirect()->route('prestasi')->with('success', 'Prestasi diterima');
    }

    public function reject($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->konfirmasi = 'ditolak';
        $prestasi->save();

        return redirect()->route('prestasi')->with('error', 'Prestasi ditolak');
    }

    public function show($id)
    {
        $data = Prestasi::find($id);

        return view('mahasiswa.prestasidetail', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.prestasitambah');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kompetisi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jns_kompetisi' => 'required',
            'jenjang' => 'required',
            'pencapaian' => 'required',
            'penyelenggara' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'kompetisi.required' => 'Nama kompetisi harus diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'jns_kompetisi.required' => 'Jenis kompetisi harus dipilih.',
            'jenjang.required' => 'Jenjang harus dipilih.',
            'pencapaian.required' => 'Pencapaian harus dipilih.',
            'penyelenggara.required' => 'Penyelenggara harus diisi.',
            'tempat.required' => 'Tempat kompetisi harus diisi.',
            'file.mimes' => 'File harus berupa dokumen PDF atau gambar (JPG, JPEG, PNG).',
            'file.max' => 'Ukuran file maksimal 2MB.',
            'file.required' => 'File harus diunggah.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        $prestasi = new Prestasi;
        $prestasi->id_user = Auth::user()->id;
        $prestasi->nama_kompetisi = $request->kompetisi;
        $prestasi->jenis_kompetisi = $request->jns_kompetisi;
        $prestasi->jenjang = $request->jenjang;
        $prestasi->pencapaian = $request->pencapaian;
        $prestasi->penyelenggara = $request->penyelenggara;
        $prestasi->tanggal_mulai = $request->tanggal_mulai;
        $prestasi->tanggal_selesai = $request->tanggal_selesai;
        $prestasi->tanggal_upload = now();
        $prestasi->tempat_kompetisi = $request->tempat;
        $prestasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/prestasi', $filename, 'public');
            $prestasi->file_bukti = $filename;
        }

        $prestasi->konfirmasi = 'on-review';
        $prestasi->alasan = "";

        $prestasi->save();

        return redirect()->route('prestasi')->with('message', 'Prestasi berhasil ditambahkan.');
    }


    public function semuaprestasi()
    {
        $prestasis = Prestasi::all();
        return view('kemahasiswaan.pengajuan', compact('prestasis'));
    }
}
