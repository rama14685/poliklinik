<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        //$obats = Obat::latest()->get();
        $obats = Obat::latest()->paginate(10);

        return view('dokter.obat.index', compact('obats'));
    }
    public function create() {
        return view('dokter.obat.create');
    }
    public function store(Request $req) {
        $req->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
        ]);

        Obat::create($req->all());

        return redirect('/dokter/obat')->with('success', 'Obat berhasil ditambahkan');
    }
    public function edit($id) {
        $obat = Obat::find($id);

        return view('dokter.obat.edit', compact('obat'));
    }
    public function update(Request $req, $id) {
        $req->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
        ]);

        Obat::find($id)->update($req->all());

        return redirect('/dokter/obat')->with('success', 'Obat berhasil diubah');
    }
    public function destroy($id) {
        Obat::find($id)->delete();

        return redirect('/dokter/obat')->with('success', 'Obat berhasil dihapus');
    }
}
