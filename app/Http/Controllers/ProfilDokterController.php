<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilDokterController extends Controller
{
    public function edit()
    {
        $dokter = Auth::user(); // Ambil dokter yang sedang login
        return view('dokter.profil.edit', compact('dokter'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama'   => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp'  => ['required', 'string'],
        ]);
        /** @var \App\Models\User $dokter */
        $dokter = Auth::user(); // Ambil dokter yang login

        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->save(); // Simpan perubahan ke database

        return redirect('/dokter/profil')->with('success', 'Profil berhasil diperbarui');
    }
}
