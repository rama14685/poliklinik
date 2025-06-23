<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaPasienController extends Controller
{
    public function index()
    {
        $pasiens = User::where('role', 'pasien')->paginate(10);
        return view('admin.mengelola_pasien.index', compact('pasiens'));
    }

    public function create()
    {
        $prefix = now()->format('Y-m'); // contoh: 2025-06

        $lastPatient = User::where('role', 'pasien')
            ->where('no_rm', 'like', $prefix . '-%')
            ->orderByDesc('no_rm')
            ->first();

        if ($lastPatient) {
            // Ambil nomor urut terakhir dari no_rm, misal: 2025-06-004 → ambil '004'
            $lastNumber = (int)substr($lastPatient->no_rm, -3);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $urutan = str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // hasil: 001, 002, dst
        $no_rm = $prefix . '-' . $urutan;

        return view('admin.mengelola_pasien.create', compact('no_rm'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
            'no_rm' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (User::where('email', $req->email)->exists()) {
            toastr()->error('Email sudah terdaftar');
            return redirect()->back()->withInput();
        }

        if (User::where('no_ktp', $req->no_ktp)->exists()) {
            toastr()->error('Nomor KTP sudah terdaftar');
            return redirect()->back()->withInput();
        }

        User::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'no_ktp' => $req->no_ktp,
            'no_hp' => $req->no_hp,
            'no_rm' => $req->no_rm,
            'role' => 'pasien', // pastikan role di-set dengan benar
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect('/admin/mengelola_pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pasien = User::findOrFail($id);
        return view('admin.mengelola_pasien.edit', compact('pasien'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
            'no_rm' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        if (User::where('email', $req->email)->where('id', '!=', $id)->exists()) {
            toastr()->error('Email sudah terdaftar');
            return redirect()->back()->withInput();
        }

        if (User::where('no_ktp', $req->no_ktp)->where('id', '!=', $id)->exists()) {
            toastr()->error('Nomor KTP sudah terdaftar');
            return redirect()->back()->withInput();
        }

        $pasien = User::findOrFail($id);

        $pasien->nama = $req->nama;
        $pasien->alamat = $req->alamat;
        $pasien->no_ktp = $req->no_ktp;
        $pasien->no_hp = $req->no_hp;
        $pasien->no_rm = $req->no_rm;
        $pasien->email = $req->email;

        // Update password hanya jika diisi
        if ($req->filled('password')) {
            $pasien->password = Hash::make($req->password);
        }

        $pasien->save();

        return redirect('/admin/mengelola_pasien')->with('success', 'Pasien berhasil diubah');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/mengelola_pasien')->with('success', 'Pasien berhasil dihapus');
    }
}
