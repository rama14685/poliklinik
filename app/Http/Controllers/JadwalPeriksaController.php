<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();
        $jadwal_periksas = JadwalPeriksa::where('id_dokter', $dokterId)->latest()->paginate(10);
        return view('dokter.jadwal_periksa.index', compact('jadwal_periksas'));
    }

    public function create()
    {
        return view('dokter.jadwal_periksa.create');
    }

    public function store(Request $req)
    {
        // Tambahkan detik
        $req->merge([
            'jam_mulai' => $req->jam_mulai . ':00',
            'jam_selesai' => $req->jam_selesai . ':00',
        ]);

        $req->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i:s',
            'jam_selesai' => 'required|date_format:H:i:s',
        ]);

        $dokterId = Auth::id();

        // Cek tabrakan jadwal
        $bentrok = JadwalPeriksa::where('id_dokter', $dokterId)
            ->where('hari', $req->hari)
            ->where(function ($query) use ($req) {
                $query->whereBetween('jam_mulai', [$req->jam_mulai, $req->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$req->jam_mulai, $req->jam_selesai])
                    ->orWhere(function ($q) use ($req) {
                        $q->where('jam_mulai', '<=', $req->jam_mulai)
                            ->where('jam_selesai', '>=', $req->jam_selesai);
                    });
            })->exists();

        if ($bentrok) {
            return back()->withErrors(['Jadwal bentrok dengan jadwal lain yang sudah ada.'])->withInput();
        }

        // Simpan
        JadwalPeriksa::create([
            'id_dokter' => $dokterId,
            'hari' => $req->hari,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai,
            'status' => 'tidak aktif',
        ]);

        return redirect('/dokter/jadwal_periksa')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal_periksa = JadwalPeriksa::where('id_dokter', Auth::id())->findOrFail($id);
        return view('dokter.jadwal_periksa.edit', compact('jadwal_periksa'));
    }

    public function update(Request $req, $id)
    {
        $jadwal = JadwalPeriksa::where('id_dokter', Auth::id())->findOrFail($id);

        if ($req->filled('jam_mulai')) {
            $req->merge(['jam_mulai' => $req->jam_mulai . ':00']);
        }

        if ($req->filled('jam_selesai')) {
            $req->merge(['jam_selesai' => $req->jam_selesai . ':00']);
        }

        $req->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'nullable|date_format:H:i:s',
            'jam_selesai' => 'nullable|date_format:H:i:s',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        // Cek apakah hari ini adalah hari jadwal
        $today = now()->locale('id')->isoFormat('dddd'); // e.g. "Senin"
        if ($today == $jadwal->hari) {
            // Tidak boleh ubah hari atau jam
            if (
                $req->hari != $jadwal->hari ||
                ($req->filled('jam_mulai') && $req->jam_mulai !== $jadwal->jam_mulai) ||
                ($req->filled('jam_selesai') && $req->jam_selesai !== $jadwal->jam_selesai)
            ) {
                return back()->withErrors(['Jadwal pada hari ini tidak dapat diubah.'])->withInput();
            }
        }

        // Jika ingin ubah ke status aktif, matikan yang lain
        if ($req->status === 'aktif') {
            JadwalPeriksa::where('id_dokter', Auth::id())
                ->where('id', '!=', $jadwal->id)
                ->update(['status' => 'tidak aktif']);
        }

        $jadwal->hari = $req->hari;
        $jadwal->status = $req->status;

        if ($req->filled('jam_mulai')) {
            $jadwal->jam_mulai = $req->jam_mulai;
        }

        if ($req->filled('jam_selesai')) {
            $jadwal->jam_selesai = $req->jam_selesai;
        }

        $jadwal->save();

        return redirect('/dokter/jadwal_periksa')->with('success', 'Jadwal berhasil diperbarui.');
    }
}
