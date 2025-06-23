<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaDokterController extends Controller
{
    public function index()
    {
        $dokters = User::where('role', 'dokter')->with('poli')->paginate(10);
        return view('admin.mengelola_dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('admin.mengelola_dokter.create', compact('polis'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string'],
            'id_poli' => ['required', 'exists:polis,id'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (User::where('email', $req->email)->exists()) {
            toastr()->error('Email sudah terdaftar');
            return redirect()->back()->withInput();
        }

        User::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'no_hp' => $req->no_hp,
            'id_poli' => $req->id_poli,
            'role' => 'dokter', // pastikan role di-set dengan benar
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect('/admin/mengelola_dokter')->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        $polis = Poli::all();
        return view('admin.mengelola_dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string'],
            'id_poli' => ['required', 'exists:polis,id'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        if (User::where('email', $req->email)->where('id', '!=', $id)->exists()) {
            toastr()->error('Email sudah terdaftar');
            return redirect()->back()->withInput();
        }

        $dokter = User::findOrFail($id);

        $dokter->nama = $req->nama;
        $dokter->alamat = $req->alamat;
        $dokter->no_hp = $req->no_hp;
        $dokter->id_poli = $req->id_poli;
        $dokter->email = $req->email;

        // Update password hanya jika diisi
        if ($req->filled('password')) {
            $dokter->password = Hash::make($req->password);
        }

        $dokter->save();

        return redirect('/admin/mengelola_dokter')->with('success', 'Dokter berhasil diubah');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/mengelola_dokter')->with('success', 'Dokter berhasil dihapus');
    }
}
