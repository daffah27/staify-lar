<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class dana extends Model
{
    protected $table = 'danas';
    protected $fillable = ['user_id', 'nama_kegiatan', 'jenis_kegiatan', 'jumlah', 'deskripsi', 'konfirmasi', 'alasan', 'nominal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
