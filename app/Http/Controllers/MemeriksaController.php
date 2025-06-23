<?php

namespace App\Http\Controllers;

use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemeriksaController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        $daftarpolis = DaftarPoli::with(['pasien', 'periksa', 'jadwal'])
            ->whereHas('jadwal', function ($query) use ($dokterId) {
                $query->where('id_dokter', $dokterId);
            })
            ->latest()
            ->get();

        return view('dokter.memeriksa.index', compact('daftarpolis'));
    }


    public function create($id)
    {
        $daftar = DaftarPoli::with('pasien')->findOrFail($id);

        // Cek apakah sudah ada periksa
        $periksa = Periksa::where('id_daftar_poli', $id)->first();

        // Jika belum ada periksa, buat object kosong (bukan insert ke DB)
        if (!$periksa) {
            $periksa = new Periksa();
            $periksa->id = null; // supaya tidak error saat akses di blade
            $periksa->id_daftar_poli = $daftar->id;
            $periksa->pasien = $daftar->pasien; // inject pasien agar bisa diakses di blade
        } else {
            $periksa->pasien = $periksa->daftarPoli->pasien;
        }

        $obats = Obat::all();
        $selected_obats = [];

        return view('dokter.memeriksa.create', compact('periksa', 'obats', 'selected_obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_polis,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required|numeric',
        ]);

        // Ambil data periksa berdasarkan ID daftar_poli
        $periksa = Periksa::where('id_daftar_poli', $request->id_daftar_poli)->first();

        if (!$periksa) {
            // Simpan baru
            $periksa = Periksa::create([
                'id_daftar_poli' => $request->id_daftar_poli,
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'biaya_periksa' => $request->biaya_periksa
            ]);
        } else {
            // Update yang sudah ada
            $periksa->update([
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'biaya_periksa' => $request->biaya_periksa
            ]);
        }

        // Hapus detail lama & buat baru
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        if ($request->has('obat')) {
            foreach ($request->obat as $obatId) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obatId,
                ]);
            }
        }

        return redirect('/dokter/memeriksa')->with('success', 'Data periksa berhasil disimpan.');
    }

    public function update(Request $req)
    {
        // Validasi input
        $req->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required|numeric',
            'obat' => 'nullable|array',
            'obat.*' => 'exists:obats,id'
        ]);

        // Update data periksa
        $periksa = Periksa::find($req->id_periksa ?? $req->route('id'));
        $periksa->update([
            'tgl_periksa' => $req->tgl_periksa,
            'catatan' => $req->catatan,
            'biaya_periksa' => $req->biaya_periksa
        ]);

        // Hapus semua detail periksa yang ada untuk periksa ini
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Tambahkan detail periksa baru jika ada obat yang dipilih
        if ($req->has('obat') && !empty($req->obat)) {
            foreach ($req->obat as $id_obat) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $id_obat
                ]);
            }
        }

        return redirect('dokter/memeriksa')->with('success', 'Data pemeriksaan berhasil disimpan');
    }
    public function edit($id)
    {
        $periksa = Periksa::with(['daftar_poli.pasien'])->findOrFail($id);
        $obats = Obat::all();
        $detail_periksa = DetailPeriksa::where('id_periksa', $id)->first();

        $selected_obats = [];
        if ($detail_periksa) {
            $selected_obats = DetailPeriksa::where('id_periksa', $id)
                ->pluck('id_obat')
                ->toArray();
        }

        return view('dokter.memeriksa.edit', compact('detail_periksa', 'periksa', 'obats', 'selected_obats'));
    }
}
