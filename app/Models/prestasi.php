<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    protected $fillable = [
        'id',
        'id_user',
        'nama_kompetisi',
        'jenis_kompetisi',
        'jenjang',
        'pencapaian',
        'penyelenggara',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_upload',
        'tempat_kompetisi',
        'deskripsi',
        'file_bukti',
        'konfirmasi',
        'alasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
