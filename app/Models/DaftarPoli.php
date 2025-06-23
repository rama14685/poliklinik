<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }
    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_daftar_poli');
    }
}
