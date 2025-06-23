<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DaftarPoliController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $polis = Poli::all();

        $daftar_polis = DaftarPoli::where('id_pasien', $user->id)
            ->with(['jadwal.dokter.poli'])
            ->orderByDesc('created_at')
            ->get();

        return view('pasien.daftar_poli.index', compact('polis', 'daftar_polis'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'required|string',
        ]);
        $id_jadwal = $request->id_jadwal;
        $jadwal = JadwalPeriksa::findOrFail($id_jadwal);
        $hariIni = now()->translatedFormat('l'); // Hari ini (Senin, Selasa, dst)

        // Cek jumlah antrian untuk jadwal & hari yang sama
        $jumlahAntrianHariIni = DaftarPoli::where('id_jadwal', $id_jadwal)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $noAntrian = $jumlahAntrianHariIni + 1;

        DaftarPoli::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal' => $id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar ke poli.');
    }

    // Digunakan oleh AJAX untuk mengisi jadwal berdasarkan poli
    public function getJadwalByPoli(Request $request)
    {
        $jadwals = JadwalPeriksa::with('dokter')
            ->whereHas('dokter', function ($q) use ($request) {
                $q->where('id_poli', $request->id_poli);
            })
            ->where('status', 'aktif')
            ->get()
            ->map(function ($jadwal) {
                return [
                    'id' => $jadwal->id,
                    'hari' => $jadwal->hari,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                    'dokter' => [
                        'id' => $jadwal->dokter->id,
                        'nama' => $jadwal->dokter->nama
                    ]
                ];
            });

        return response()->json($jadwals);
    }
    public function detail($id)
    {
        $daftar_poli = DaftarPoli::with('jadwal.dokter.poli')
            ->where('id', $id)
            ->where('id_pasien', Auth::id())
            ->firstOrFail();

        return view('pasien.daftar_poli.detail_daftar_poli', compact('daftar_poli'));
    }

    public function riwayat($id)
    {
        $daftar_poli = DaftarPoli::with([
            'jadwal.dokter.poli',
            'periksa.detail_periksa_periksa.obat'
        ])
            ->where('id', $id)
            ->where('id_pasien', Auth::id())
            ->firstOrFail();

        $periksa = $daftar_poli->periksa->first(); // Karena relasi hasMany
        $detail_obat = $periksa ? $periksa->detail_periksa_periksa : collect();

        return view('pasien.daftar_poli.riwayat_daftar_poli', compact('daftar_poli', 'periksa', 'detail_obat'));
    }
}
