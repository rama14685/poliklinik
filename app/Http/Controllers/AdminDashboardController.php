<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Poli;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung data ringkasan
        $jumlahDokter = User::where('role', 'dokter')->count();
        $jumlahPasien = User::where('role', 'pasien')->count();
        $jumlahPoli = Poli::count();
        $jumlahObat = Obat::count();

        // 2. Menyiapkan data untuk Grafik Pasien per Poli (DENGAN QUERY FINAL)
        $pasienPerPoli = DB::table('daftar_polis')
            // Dari pendaftaran, kita hubungkan ke jadwal
            ->join('jadwal_periksas', 'daftar_polis.id_jadwal', '=', 'jadwal_periksas.id')
            
            // =========================================================================================
            // PERUBAHAN KUNCI ADA DI SINI: Kita hubungkan ke tabel 'users' bukan 'dokters'
            // Pastikan kolom 'id_dokter' ada di tabel 'jadwal_periksas'
            // =========================================================================================
            ->join('users', 'jadwal_periksas.id_dokter', '=', 'users.id')
            
            // =========================================================================================
            // Dari tabel 'users', kita hubungkan ke 'polis'
            // Pastikan kolom 'id_poli' ada di tabel 'users' untuk para dokter
            // =========================================================================================
            ->join('polis', 'users.id_poli', '=', 'polis.id')

            // Pastikan kita hanya menghitung untuk user yang rolenya dokter
            ->where('users.role', 'dokter')
            ->select('polis.nama_poli', DB::raw('COUNT(daftar_polis.id) as jumlah_pasien'))
            ->groupBy('polis.nama_poli')
            ->orderBy('jumlah_pasien', 'desc')
            ->get();
        
        $chartLabels = $pasienPerPoli->pluck('nama_poli');
        $chartData = $pasienPerPoli->pluck('jumlah_pasien');

        // 3. Mengirim semua data ke view
        return view('admin.index', compact(
            'jumlahDokter',
            'jumlahPasien',
            'jumlahPoli',
            'jumlahObat',
            'chartLabels',
            'chartData'
        ));
    }
}