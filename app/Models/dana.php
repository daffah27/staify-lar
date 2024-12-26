<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class dana extends Model
{
    protected $table = 'danas';
    protected $fillable = [
        'id_user',
        'nama_kegiatan',
        'jenis_kegiatan',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'konfirmasi',
        'alasan',
        'nominal'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');    
    }
}
