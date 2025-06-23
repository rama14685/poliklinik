<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class KelolaPoliController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->paginate(10);

        return view('admin.mengelola_poli.index', compact('polis'));
    }
    public function create()
    {
        return view('admin.mengelola_poli.create');
    }
    public function store(Request $req)
    {
        $req->validate([
            'nama_poli' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        Poli::create($req->all());

        return redirect('/admin/mengelola_poli')->with('success', 'Poli berhasil ditambahkan');
    }
    public function edit($id)
    {
        $poli = Poli::find($id);

        return view('admin.mengelola_poli.edit', compact('poli'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'nama_poli' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        Poli::find($id)->update($req->all());

        return redirect('/admin/mengelola_poli')->with('success', 'Poli berhasil diubah');
    }
    public function destroy($id)
    {
        Poli::find($id)->delete();

        return redirect('/admin/mengelola_poli')->with('success', 'Poli berhasil dihapus');
    }
}
