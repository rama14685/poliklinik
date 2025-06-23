<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'no_ktp' => 'required|numeric',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if (User::where('email', $validatedData['email'])->exists()) {
            toastr()->error('Email sudah terdaftar');
            return redirect()->back()->withInput();
        }

        if (User::where('no_ktp', $validatedData['no_ktp'])->exists()) {
            toastr()->error('Nomor KTP sudah terdaftar');
            return redirect()->back()->withInput();
        }

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

        User::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_rm' => $no_rm,
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'pasien',
        ]);

        toastr()->success('Registrasi berhasil, silahkan login');
        return redirect('/login')->withInput();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            toastr()->success('Selamat datang ' . $user->nama);

            if ($user->role === 'dokter') {
                return redirect('dokter/dashboard');
            }
            if ($user->role === 'pasien') {
                return redirect('pasien/dashboard');
            }
            if ($user->role === 'admin') {
                return redirect('admin/dashboard');
            } else {
                return abort(403, 'Unauthorized action.');
            }
        }

        toastr()->error('Email atau password salah');
        return redirect()->back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toastr()->success('Anda berhasil logout');
        return redirect('/login');
    }
}
