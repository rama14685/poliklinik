<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
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
