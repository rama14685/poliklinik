<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        $pasiens = User::where('role', 'pasien')
            ->with([
                'daftar_poli_pasien.periksa.detail_periksa_periksa.obat',
                'daftar_poli_pasien.jadwal.dokter'
            ])
            ->paginate(10);

        return view('dokter.riwayat_pasien.index', compact('pasiens'));
    }
}
