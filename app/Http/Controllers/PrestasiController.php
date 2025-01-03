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

        $apikey ='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';
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
            'subject' => '🎉 Prestasi Anda Telah Diterima!',
            'htmlContent' => '<html>
                                <body>
                                    <p>Halo <strong>' . $prestasi->user->name . '</strong>,</p>
                                    <p>Selamat! Kami dengan senang hati menginformasikan bahwa prestasi <strong>"' . $prestasi->pencapaian . ' pada ' . $prestasi->nama_kompetisi . '"</strong> telah kami terima.</p>
                                    <p>Prestasi ini akan menjadi bagian dari portofolio Anda. Kami sangat mengapresiasi dedikasi dan usaha Anda dalam mencapai prestasi ini.</p>
                                    <p>Jika Anda memiliki pertanyaan atau ingin melakukan pembaruan pada data prestasi Anda, jangan ragu untuk menghubungi tim kami.</p>
                                    <p>Terima kasih telah menggunakan <strong>Staify</strong>,</p>
                                    <p><em>Admin Kemahasiswaan</em></p>
                                </body>
                            </html>',
        ]);

        return redirect()->route('prestasi')->with('success', 'Prestasi diterima');
    }

    public function reject($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->konfirmasi = 'ditolak';
        $prestasi->alasan = request('alasan');
        $prestasi->save();

        $apikey ='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';
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
            'subject' => '😔 Prestasi Anda Belum Bisa Diterima',
            'htmlContent' => '<html>
                                <body>
                                    <p>Halo <strong>' . $prestasi->user->name . '</strong>,</p>
                                    <p>Terima kasih telah mengirimkan prestasi Anda <strong>"' . $prestasi->pencapaian . ' pada ' . $prestasi->nama_kompetisi . '"</strong> untuk kami tinjau. Setelah melalui proses evaluasi, kami mohon maaf bahwa prestasi tersebut belum dapat kami terima.</p>
                                    <p>Dengan alasan, <strong>' . $prestasi->alasan . '</strong>. Kami sangat menghargai usaha Anda dan mendorong Anda untuk terus berkarya. Anda dapat memperbaiki atau melengkapi data prestasi Anda dan mengajukannya kembali di kemudian hari.</p>
                                    <p>Jika Anda memerlukan panduan atau klarifikasi lebih lanjut, jangan ragu untuk menghubungi tim kami.</p>
                                    <p>Terima kasih atas pengertian Anda dan teruslah bersemangat!</p>
                                    <p><em>Admin Kemahasiswaan</em></p>
                                </body>
                            </html>',
        ]);

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
