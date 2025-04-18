<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function index() {
        $dokters = User::where('role', 'dokter')->latest()->get();

        // Ambil hanya data periksa milik pasien yang sedang login
        $periksas = Periksa::where('id_pasien', Auth::id())->latest()->paginate(10);

        return view('pasien.periksa.index', compact('periksas', 'dokters'));
    }
    /*
    public function create() {
        $dokters = User::where('role', 'dokter')->latest()->get();
        return view('pasien.periksa.create', compact('dokters'));
    }
    */
    public function store(Request $req) {
        $req->validate([
            'id_dokter' => ['required'],
        ]);
        $data = [
            'id_dokter' => $req['id_dokter'],
            'id_pasien' => Auth::id(),
        ];

        Periksa::create($data);

        return redirect('/pasien/periksa')->with('success', 'Periksa berhasil ditambahkan');
    }
}
