<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    protected $fillable = [
        'id_user',
        'nama_kegiatan',
        'jenis_kegiatan',
        'status',
        'link_pendaftaran',
        'link_juknis',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'penyelenggara',
        'file_kegiatan',
    ];
}
