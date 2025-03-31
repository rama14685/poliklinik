<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        $obats = Obat::all();

        return view('dokter.obat', compact('obats'));
    }
}
