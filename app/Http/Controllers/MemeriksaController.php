<?php

namespace App\Http\Controllers;

use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;
use Illuminate\Http\Request;

class MemeriksaController extends Controller
{
    public function index() {
        //$pasiens = User::where('role', 'pasien')->latest()->get();
        $memeriksas = Periksa::latest()->paginate(10);
        return view('dokter.memeriksa.index', compact('memeriksas', ));
    }

    public function create($id)
    {
        $periksa = Periksa::find($id);
        $obats = Obat::all();
        $detail_periksa = DetailPeriksa::find($id);

        $selected_obats = [];
        if ($detail_periksa) {
            // Asumsikan ada relasi 'obats' di model DetailPeriksa
            $selected_obats = $detail_periksa->obats->pluck('id')->toArray();
        }

        return view('dokter.memeriksa.create', data: compact('detail_periksa', 'periksa', 'obats', 'selected_obats', ));
    }
    public function store(Request $req)
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
        $periksa = Periksa::find($id);
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