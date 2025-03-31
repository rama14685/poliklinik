<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];

    public function detail(){
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }
    public function obat(){
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
